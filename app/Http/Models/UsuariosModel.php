<?php

namespace App\Http\Models; 

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\FormulariosModel;
use App\Http\Models\ImagenesModel;
class UsuariosModel extends Model
{
  protected $formularioModel;
  protected $imagenesModel;
 public function __construct(){
  $this->formularioModel = new FormulariosModel();
  $this->imagenesModel = new ImagenesModel();
 }
  
  public function obtenerUsuarios(){
    
    return  DB::select('SELECT * FROM datosusuario',  [1]);
          
    }
   public function ultimo_id($tabla, $key){
      
      
      $mayor_id = DB::table($tabla)->max($key);
      return ++ $mayor_id;
   }
   
  
 public function registrar_permiso($datos){
  /* var_dump($datos); */
  $sql ="INSERT INTO `usuario_permisos`";
  $campos=''; 
  $valores='';
  foreach ($datos as $key => $value) {
    if($campos==''){
      $campos = $key;
    }else{
      $campos = $campos.', '.$key;
    }
    if($valores==''){
      $valores=$value;
    }else{
      $valores=$valores.', '. $value;
    }
    
  }
  $sql = $sql. ' ('. $campos.') VALUES ('. $valores.')';
       
            if( DB::select($sql)){
                $verifico=  true; 
            }else{
              $verifico=  false;
            }
            return $verifico; 
 }

 public function registro_usuario($datos){
      $mensajes= array();  
    //var_dump($datos);
      if(isset($datos['imagenes']) && !empty($datos['imagenes'])){
        if(DB::table('imagenes')->insert($datos['imagenes'])){
          $mensajes['img'][1] = 'El archivo de imagen ha sido copiado exitosamente.';    
        
        }else{
        
          $mensajes['img'][0] ='Ocurrió algun error al copiar el archivo de imagen al server.'; 
        
        }
     }
      
        
      if(DB::table('usuarios')->insert($datos['usuarios'])){
          $mensajes['usuarios'][1] = 'La tabla usuario fue actualizada correctamente';
            
        }else{
          $mensajes['usuarios'][0] = 'Error al intentar actulizar el servidor con los datos de usuario, reintente';
        }
        if(DB::table('datosusuario')->insert($datos['datosusuario'])){
          $mensajes['datosusuario'][1] = 'La tabla datos de usuario fue actualizada correctamente';
            
        }else{
          $mensajes['datosusuario'][0] = 'Error al intentar actulizar la tabla datosusuario, reintente';
        }
        if(DB::table('usuario_permisos')->insert($datos['usuario_permisos'])){
          $mensajes['usuario_permisos'][1] = 'La tabla de datos permisos fue actualizada correctamente';
      
        }else{
          $mensajes['datosusuario'][0] = 'Error al intentar actulizar la tabla de permisos, reintente';
        }    
        
      
    return $mensajes;   
    //var_dump($mensajes); 

        
    }
 
 public function verificar_user($datos){
   //  var_dump($datos);   
  
        
        
        $query =  DB::select('SELECT * FROM usuarios us, datosusuario dtus where 
        us.pk_usuario = dtus.fk_usuario 
        and  dtus.email = "'.$datos['datosusuario']['email'].'";', [1]);
        
        if(empty($query)){
          return false;
        }
        
         
    //if the username is not in db then insert to the table
/*** for login process ***/

    }
    public function verificar_permisos($clave){
      $query= DB::select('SELECT a.pk_permiso as permiso FROM usuario_permisos a WHERE a.pk_usuario = '.$clave.'', [1])[0];
      
   if(empty($query)){
     return false;
     
   }
     return $query;
    }
    public function verificar_login($datos){
       /*  echo 'comparar valores recibidos'. var_dump($datos); */
       $query= DB::select('SELECT * FROM usuarios us, datosusuario dtus where 
        us.pk_usuario = dtus.fk_usuario and us.psw = "'. $datos['psw'].'" and dtus.email = "'.$datos['email'].'"', [1]);
        
     if(empty($query)){
       return false;
       // echo'no se encontraron datos';
     }
       return $query[0];
        
       
       
        

    }








}
