<?php namespace App\Controllers;

class Imagenes extends Controller

{

public function __construct(){
  
  $this->datos['seccion'] = "admin";
  
}
public function index(){
  echo 'Bienvenido a imagenes';
}
   

public function insertar_imagen(){
    
    $this->datos['pagina'] = 'insertar_imagen';
    $datos=  $this->PaginasModel->cargar_datos('cargar_imagen');  
    $this->datos['menu'] = $this->MenusModel->datos_principales('cargar_imagen');
    echo view('page', $this->datos); 

  }
  public function cargar_imagen(){
    $datoPagina = '';
           if((isset($_FILES['archivo'])) && ($_FILES['archivo'] !=='')){
             $file = obtener_binario($_FILES['archivo']);
             $datoPagina =  '<a href="#"><img src="'.previa_imagen($_FILES['archivo']). '">  <span> Ver previa</span></a>';
                 $datos['imagenes']= array('pk_imagen'=>0,
                                     'nombre_archivo'=> $file['name'],
                                     'binario'=> $file['binario'], 
                                     'extension'=> $file['extension']);
                                     $mensaje_guardado = '';
                                     $datoPagina= $datoPagina.'
                                           <div class ="container">';
                                           $datoPagina= $datoPagina. '<h1>cargando imagen</h1>';
                                               if ($this->ImagenesModel->altaimagen($datos)){
                                                 $mensaje_guardado='El archivo ha sido copiado exitosamente.';
                                               }else{
                                                 $mensaje_guardado= 'Ocurrió algun error al copiar el archivo.';
                                               }
                                               $datoPagina= $datoPagina.$mensaje_guardado .'</div>';
           }else{
             $datoPagina='
             <div class ="container">';
             $datoPagina= $datoPagina. '<h1>No se ha cargado ninguna imagen </h1></div>';
           }
           
           
           $this->datos['mostrar'] = $datoPagina;
           $this->datos['pagina'] = 'cargar_imagen';
           $datos=  $this->PaginasModel->cargar_datos('cargar_imagen');  
           $this->datos['menu'] = $this->MenusModel->datos_principales('cargar_imagen');
           //var_dump($this->datos);
           echo view('page', $this->datos);      
           
     }    


  public function obtener_binario($file){

    return array(
        'name'=> $file['name'],
        'binario'=> base64_encode(file_get_contents($file['tmp_name'])),
        'extension'=> explode('.',$file['name'])[1]
    
    );
      
      
    }
    public function previa_imagen($file){
        $imageData = base64_encode(file_get_contents($file['tmp_name']));
      return 'data:'.$file['type'].';base64,'.$imageData;
       
      }
      
  public function vista_img($id_imagen){
        if($this->ImagenesModel->obtenerimagen($id_imagen)[0]){
          $datos = $this->ImagenesModel->obtenerimagen($id_imagen)[0];
          $mime = $this->ImagenesModel->obtenerMime($datos['extension'])['mime'];
          return 'data:'.$mime.';base64,'.$datos['binario'];
        }else{
          return false;
        }  
    
    }
    
    
  
   
    public function  mostrar_imagen($img=false){
  
      $datoPagina='';
    
             if($img !==false && $this->vista_img($img)!== false){
    
                 $datoPagina= $datoPagina. '<img src="'.$this->vista_img($img).'" />';
    
             }else{
    
               $datoPagina= $datoPagina. '<h1>Imagen no encontrada</h1>';
    
             } 
    
             echo $datoPagina;
    
    }
  


}
?>