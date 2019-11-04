<?php namespace App\Http\Controllers;


use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Usuarios extends Controller
{  
  
 public function ultimo_id($tabla, $key){
    $mayor_id = DB::table($tabla)->max($key);
    return ++ $mayor_id;
 }
public function buscar_permiso($clave){
  return $this->UsuariosModel->verificar_permisos($clave);
   
}
public function form_login(){
  echo 'llegada al form login ' ;
  //return view('auth.login'); 
}
public function login_verifico(){
 // var_dump($_POST);
$datos_post = array(
     'email'=>  trim($_POST['email']),
     'psw'=>  md5(trim($_POST['password']))  ,
);

      $resultado = $this->UsuariosModel->verificar_login($datos_post);
    if($resultado !== false){
        
       if(!empty($resultado->fk_imagen)){
          if($this->ImagenesModel->obtenerimagen($resultado->fk_imagen)){
            $datos = $this->ImagenesModel->obtenerimagen($resultado->fk_imagen);
        // var_dump($datos);
            $mime = $this->ImagenesModel->obtenerMime($datos->extension)->mime;
          
          
          $resultado->dato_binario = 'data:'.$mime.';base64,'.$datos->binario;
        }
       }
         
        
          /*marca de buscar permiso*/ 
      
        /* var_dump($newdata); */
        
        session()->put('login', ['datos_usuario'=>  $resultado, 'sesion_iniciada' => TRUE, 'permiso'=> $this->buscar_permiso($resultado->pk_usuario)]);
        session()->flash('mensajes_form', array('msg'=> 'bienvenido', 'tipo_msg'=> 'sc'));
        
      
    }else{
       // session()->remove('mensajes_form');
     // session()->remove('login');
      
      session()->flash('mensajes_form',  array('msg'=> 'Nombre de usuario o contraseña incorrectos', 'tipo_msg'=> 'wr'));
      return redirect('form_login');
      
    }
      
    
    return redirect()->back();
  
    
 /*** for registration process ***/
  }
 public function form_register_user(){
  
   // var_dump($errors->register->all());

  return view('auth.register');
 } 
  public function register_user(Request $request){ // recibo por post los datos de usuario y la imagen 
    
    
  
  $rules = array( 
                  'username' => 'required|unique:usuarios|max:20',              
                  'nombre' => 'required|max:20',   // just a normal required validation 
                  'apellido' => 'required',
                  'email' => 'required|email|unique:datosusuario',  // required and must be unique in the ducks table 
                  'psw' => 'required|min:5|max:20', 
                  'pswconfirm' => 'required|same:psw' // required and has to match the password field 
                ); 
    $messages = [
      'username.unique' => 'Ya existe un usuario con dicho nombre de usuario.',
      'username.required' => 'Escribe tu nombre de Usuario, este dato es obligatorio.',
      'username.max' => 'El nombre de usuario no debe ser mayor a :max caracteres.',
      'nombre.required' => 'El nombre es un dato obligatorio.',
      'nombre.max' => 'Tu nombre real no debe ser mayor a :max caracteres.',
      'apellido.required' => 'El apellido de usuario es obligatorio.',
      'apellido.max' => 'Tu nombre real no debe ser mayor a :max caracteres.',
      'email.required' => 'El email es obligatorio , escriba uno valido ejemplo :email@host.com',
      'email.unique' => 'El email ya esta registrado',
      'psw.required' => 'La contraseña es obligatoria.',
      'psw.max' => 'La contraseña no debe ser mayor a 20 caracteres.',
      'psw.min' => 'La contraseña  debe ser mayor a 5 caracteres.',
      'pswconfirm.required' => 'La contraseña de confirmación es obligatoria.',
      'pswconfirm.same' => 'La contraseña de  confirmación escrita es diferente a la contraseña ingresada.'
      
  ];                
  
              
            $validator = Validator::make($request->all(), $rules, $messages);            
  
                if($validator->fails()){

                      return redirect('user/form_register_user')
                        ->withErrors($validator)  
                        ->withInput($request->all());
                    
                }
    
  $dato_insert = array();  
  $dato_insert['usuarios']= array(
      'pk_usuario'=> $this->ultimo_id('usuarios', 'pk_usuario'),
      'username' =>    $request->username,
      'psw'=> md5(trim($request->psw)),
      'creado'=> date("Y-m-d H:i:s"),
      'modificado'=> date("Y-m-d H:i:s"),
      'estado' => 1
  );
    $dato_insert['datosusuario']= array(
      'fk_usuario' =>  $dato_insert['usuarios']['pk_usuario'], 
      'nombre' => $request->nombre, 
      'apellido' => $request->apellido, 
      'telefono' => $request->telefono, 
      'email' => $request->email,
      'fk_imagen'=> $this->ultimo_id('imagenes', 'pk_imagen')
    );
    $dato_insert['usuario_permisos']= array(
      'pk_usuario' =>  $dato_insert['usuarios']['pk_usuario'],
      'pk_permiso' => 1
    );
    
    //var_dump($request->imagen->get('fileName'));
    /* var_dump($request->imagen); */
    /* var_dump($request->imagen->hashName()); */
    /* var_dump($request->imagen->path()); //recupera path junto con nombre de archivo */
//     var_dump($_FILES); 

if(isset($request->binario_img)){
      $binario_img = explode('data:image/jpeg;base64,',$request->binario_img)[1]; //elijo que llegue el binario desde el cliente
      /* $binario_img = $file['binario']; */
       $file= $this->ImagenesModel->obtener_binario($_FILES['imagen']); 
       $dato_insert['imagenes']= array(
        'pk_imagen'=> $dato_insert['datosusuario']['fk_imagen'], 
        'nombre_archivo'=> $file['name'], 
        'binario'=> $binario_img,
        'extension'=> $file['extension'], 
        'fecha_edicion'=> $dato_insert['usuarios']['creado']
        );

}else{
  $dato_insert['datosusuario']['fk_imagen']=null;
}


      $mensajes_msg = ""; 
    $mensajes =  $this->UsuariosModel->registro_usuario($dato_insert);
    $contador_ok = 0; 
    $contador_error = 0; 
    foreach ($mensajes as $key => $value) {
       if(key($value)==1){
          $mensajes_msg = $mensajes_msg. '<p>'.$value[key($value)].'</p>';
          $contador_ok = $contador_ok +1; 
        }else{
          $mensajes_msg = $mensajes_msg. '<p>'.$value[key($value)].'</p>';
          $contador_error= $contador_error +1;
        }    
      
    }
      if($contador_error>1){
        session()->flash('mensajes_form', array('msg'=> 'Hubo errores: verifique '.$mensajes_msg, 'tipo_msg'=> 'wr'));  
      }else{
        session()->flash('mensajes_form', array('msg'=> 'Te registraste con exito:', 'tipo_msg'=> 'sc'));
      }
    return redirect()->back();   

  /* fin de seccion de guardar datos de usuario  */
  } 
  
  
 public function encontrar_nombre($pk_usuario){
       $nombre_completo = $this->UsuariosModel->encontrar_nombreusuario($pk_usuario);                        
    
                   return $nombre_completo['nombre']; 
        }
        
              
 public function inicio_sesion(){
            
                        return $_SESSION['login'];
          
                  }
 public function user_logout() {
    
  \Auth::logout();
    //session()->destroy();
   // session()->start();
    
      session()->put('login', array('datos_usuario'=>  '', 'sesion_iniciada' => FALSE));
      session()->flash('mensajes_form', array('msg'=> 'hasta luego', 'tipo_msg'=> 'sc'));
   
    return redirect()->back();
  
           }  
          
public function restore_psw(){
  
   
  
          }
}
?>
