<?php

namespace App\Http\Models; 


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class PaginasModel extends Model
{
    public function datos_pagina($pagina){
        $imp='';
        $paginas_arr['contact']['titulo']= ucfirst('contacto');
        $paginas_arr['faq']['titulo']= ucfirst('Ayuda');
        $paginas_arr['blog-detail']['titulo']= ucfirst('detalles de noticias');
        $paginas_arr['blog']['titulo']= ucfirst('Noticias');
        $paginas_arr['blog-detail']['titulo']= ucfirst('Detalle');
        $paginas_arr['about']['titulo']= ucfirst('acerca de');
        $paginas_arr['index']['titulo']= ucfirst('principal');
        $paginas_arr['shoping-cart']['titulo']= ucfirst('shoping cart');
        $paginas_arr['home-03']['titulo']= ucfirst('Principal');
        $paginas_arr['home-02']['titulo']= ucfirst('Principal');
        $paginas_arr['product-detail']['titulo']= ucfirst('Detalle de producto');
        $paginas_arr['product']['titulo']= ucfirst('Productos');
        $paginas_arr['news']['titulo']= ucfirst('Noticias');
        if(isset($paginas_arr[$pagina]['titulo'])){
            $imp=  $paginas_arr[$pagina]['titulo'];
        }else{
            if($pagina=='home'){
                $imp=  'Inicio';
            }elseif(isset($paginas_arr[$pagina]['titulo'])){
                $imp=  $paginas_arr[$pagina]['titulo'];
            }else{
                $imp=  ucfirst($pagina);
            }
          
        }
        return $imp;
        
      }
      public function cargar_datos($page=false){
		 
		$datos['titulo'] = $this->datos_pagina($page);
		$datos['idioma_web'] = "ES";
		$datos['pagina']= $page; 
		$datos['admin']='';
			 return $datos;
	  }
 
}
