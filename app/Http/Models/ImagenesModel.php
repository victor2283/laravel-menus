<?php

namespace App\Http\Models; 

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class ImagenesModel extends Model
{
 
  public function ultimo_id($tabla, $key){
    $mayor_id = DB::table($tabla)->max($key);
    return ++ $mayor_id;
 }
  
    public function obtenerMime($extension){
      return DB::select('SELECT m.mime FROM mime as m WHERE  m.extension = "'.$extension.'"', [1])[0];  
      //var_dump($return);
    }
    
  public function id_ultimo_img(){
    $result =  DB::select('select max(pk_imagen) as id from imagenes', [1])[0];  
    
      return $result->id+1;
    
  }

public function altaimagen($datos){
 
   $datos['fecha_edicion']=date("Y-m-d H:i:s"); 
   if(is_null($datos['pk_imagen'])){
     $datos['pk_imagen'] =  $this->ultimo_id('imagenes', 'pk_imagen');          
   }
 
    if(DB::table('imagenes')->insert(
      $datos
    )){
      return true;
    }else{
      return false;
    } 
  
 }

 public function obtenerimagen($id){
  return DB::select('SELECT * from `imagenes` WHERE pk_imagen='.$id.'', [1])[0];
  
  
      
  }
  public function obtener_binario($file){
    return empty($file['tmp_name'])? false :  array(
    'name'=> $file['name'],
    'binario'=> base64_encode(file_get_contents($file['tmp_name'])),
    'extension'=> explode('.',$file['name'])[1]
  
    ); 
    
    
  
    
    
  }
  public function previa_imagen($file){
    return empty($file['tmp_name'])? false : 'data:'.$file['type'].';base64,'.base64_encode(file_get_contents($file['tmp_name']));  
    
    }
  



}
