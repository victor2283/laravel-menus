<?php

namespace App\Http\Models; 
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class FormulariosModel extends Model
{
    public function datosalta_sql($datosTabla, $tabla, $arr_insertar){
   
        $camposinsert = '';
        $camposinsertDatos= '';     
   
     
     foreach ($datosTabla as $key_datos => $valor_datos) {
        // echo $key_datos.'-'.$valor_datos.'<br>';
        if(isset($arr_insertar[$key_datos]) && $arr_insertar[$key_datos]!==null){
         $datosTabla[$key_datos]= $arr_insertar[$key_datos];
        }
        
     }
     //var_dump($datosTabla);
     
     $c=0;
     foreach ($datosTabla as $key_datos => $valor_datos) {
         //echo 'key-> '.$key_datos.'<br>';
         //echo 'valor insertar ->'. $valor_datos.'<br>';
         if(!is_numeric($valor_datos)){
             echo 'No es numerico <hr> <br>';
             $valor_datos = "'".$valor_datos."'";
             
         }
         if($c==0){
             $camposinsert= "(`".$key_datos. "`";
             $camposinsertDatos = "(".$valor_datos;
         }else{
             $camposinsert= $camposinsert. ", `".$key_datos."`";
             $camposinsertDatos = $camposinsertDatos.", ".$valor_datos;
         }
         $c++;
     }
     $camposinsert= $camposinsert. ')';
     $camposinsertDatos = $camposinsertDatos . ')';
     //$datos_insertar = array('campos'=> $camposinsert, 'datos_insertar'=> $camposinsertDatos);
     //var_dump($datos_insertar);       
     return array('campos'=> $camposinsert, 'datos_insertar'=> $camposinsertDatos);
              
         }
    public function objetToArray($adminBar){
        $reflector = new ReflectionObject($adminBar);
        $nodes = $reflector->getProperties();
        $out=[];
        foreach ($nodes as  $node) {
            $nod=$reflector->getProperty($node->getName());
            $nod->setAccessible(true);
            $out[$node->getName()]=$nod->getValue($adminBar);
        }
        return $out;
    }
    
    public function obtenerFormulario($form_nombre){
        
        $query = $this->query("
        select t.pk_tabla as pk_tabla, t.nombre as nombre_tabla, pg.ref as referencia, pg2.ref as destino 
        from formulario f, tabla_form tf, tabla t, pagina pg, pagina pg2 
        where pg.pk_pagina = f.fk_pagina 
        and pg2.pk_pagina = f.fk_destino 
        and tf.fk_formulario =f.fk_tabla_form 
        and t.pk_tabla= tf.fk_tabla 
        and f.nombre = '".$form_nombre."'");
        return $query->getResultArray();
    }
    public function ultimo_id($tabla, $key){
        //$query=   $this->query('select max('.$key.') as id FROM '.$tabla);
       echo $key .'->key';
       echo '/ tabla -> ' .$tabla; 
       $this->table = $tabla;
       $this->selectMax($key);
       $query = $this->get(); 
       return  ($query->getResultArray()[0][$key])+1;
       
        
        //var_dump(++$query->getResultArray()[0]);
        
       //return  ($this->getResultArray()[0])+1;
        //return $query->getResultArray()
        //return   $this->get()+1; 
        
        /* $this->query('select max(`'.$key.'`) as id FROM `'.$tabla.'`');
        return  ++ $this->record()->id; */
     }
    
    
   
   
    public function operacionABM($operacion,  $datos){
       
        foreach ($datos  as $tabla => $datosTabla) {
                foreach ($datosTabla as $keytabla => $valuetabla) {
                    
                   $v=  explode('_',$keytabla);
                    foreach ($datos  as $tabla1 => $datosTabla1) {
                        foreach ($datosTabla1 as $keytabla1 => $valuetabla1) {
                      //      echo $keytabla1;
                        $v1=  explode('_',$keytabla1);
                         if($v[0]=='pk' && $v1[0]=='fk'){
                            //    echo $keytabla1.' depende de '. $keytabla.'<br>';
                              //echo $operacion;
                              
                                switch ($operacion) {
                                    case 'agregar':
                                        $this->db->query('select max('.$keytabla.') as id FROM '.$tabla.'');
                                        $id_ultimo = ++ $this->db->record()->id;
                                        $resultado1=    $this->armardatosalta($datosTabla1, $keytabla1, $id_ultimo);
                                        
                                        $this->db->query("INSERT INTO ".$tabla1." (".$resultado1['campos'].") values (".$resultado1['datos_insertar'].");");                                 
                                        if($this->db->execute()){
                                            $resultado=    $this->armardatosalta($datosTabla, $keytabla, $id_ultimo);                    
                                            $this->db->query("INSERT INTO ".$tabla." (".$resultado['campos'].") values (".$resultado['datos_insertar'].");");                                 
                                               if($this->db->execute()){
                                                 return true;
                                               }else{
                                                    return false;
                                               }

                                        }else{
                                                return false;     
                                        }
                                     
                                        break;
                                    
                                    default:
                                         
                                        break;
                                }
                                 
                         }else{

                         }

                        }   
                    }   

                }   
         
            
            
             
         }
            
          //return var_dump($datos);
        
        
    }
    
    public function armardatosalta($datosTabla, $keytabla, $id_ultimo){
        $camposinsert = '';
        $camposinsertDatos= ''; 
        foreach ($datosTabla as $kt => $vt){
            
            if($keytabla==$kt){
                $aux_verifico = explode('_', $kt);
                if($aux_verifico[0]=='pk' || $aux_verifico[0]=='fk'){
                    $aux_kt = $kt; $aux_vt = $id_ultimo;      
                }
            }else{
                $aux_kt = $kt; $aux_vt = $vt;      
            
            }
            if($camposinsert == '' && $camposinsertDatos== ''){
                $camposinsert = $aux_kt;
                if(is_numeric($aux_vt)){
                    $camposinsertDatos = $aux_vt;
                }else{
                    $camposinsertDatos = "'".$aux_vt."'";
                }
                
            }else{
                $camposinsert = $camposinsert.','.$aux_kt;
                if(is_numeric($aux_vt)){
                    $camposinsertDatos = $camposinsertDatos.",".$aux_vt;
                }else{
                    $camposinsertDatos = $camposinsertDatos.",'".$aux_vt."'";
                }
                
            }
            
            
        }
        return array('campos'=> $camposinsert, 'datos_insertar'=> $camposinsertDatos);
        
    }
}
