<?php

namespace App\Http\Models; 
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\FormulariosModel;
use App\Http\Models\ImagenesModel; 
use App\Http\Models\MenusModel;
use App\Http\Models\NewsModel;
use App\Http\Models\PaginasModel;
use App\Http\Models\UsuariosModel;

class MenusModel extends Model
{
    public function obtenerMenu(){
 
        $query = $this->query('
        SELECT a.nombre, a.pk_op_item as cditem, b.fk_op_item_dep as depende,
         pa.ref as ref FROM menu_opciones a JOIN menu_op_item_dep b 
         ON a.pk_op_item = b.fk_op_item join pagina pa on pa.pk_pagina = a.fk_pagina
        
        ');
        
        return $query->getResultArray();
    }
    
    public function obtenerCamposTabla($tabla){
        $this->db->query('show columns from '.$tabla);
          return $this->db->records();
    }
    
    public function datos_menu($pagina){
      $opciones_menu  = array();
     if($pagina == 'administrar'){
       $opciones_menu = $this->menu_administrar();
     }else{
      $opciones_menu = $this->obtenerMenu();
    
    }
    
    return array('titulo_menu'=> 'sistemas',
                 'opciones_menu'=> $opciones_menu
  
    );
  }
 
  public function menu_administrar(){
      return  '   

      <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
          
           <!--<li class="has-children">
              <a href="#">Imagenes</a>
              <ul class="dropdown">
                <li><a href="administrar/rutas/imagenes/a">Agregar</a></li>
                <li><a href="administrar/rutas/imagenes/b">Eliminar</a></li>
                <li><a href="administrar/rutas/imagenes/m">Editar</a></li>
                <li><a href="administrar/rutas/paginas/Buscar">Buscar</a></li>
              </ul>
            </li>-->
            <li><a href="administrar/rutas/paginas">Páginas</a></li>
            <li><a href="administrar/rutas/imagenes">Imagenes</a></li>
            <li><a href="">Permisos</a></li>
            <li><a href="administrar/rutas/info">Información del Sitio</a></li>
            <li><a href="administrar/rutas/ayuda">Ayuda</a></li> 
        </ul>
      </div>';
      
    
    }
    
    public function datos_principales($pagina){

		
		$menu['admin']['items'][0] = array('ref'=> 'admin/index', 'titulo'=> 'Inicio', 'depende'=> 0, 'data-label1'=> '');
		$menu['admin']['items'][1] = array('ref'=> 'admin/index', 'titulo'=> 'Productos', 'depende'=> 0, 'data-label1'=> '');
		$menu['admin']['items'][2] = array('ref'=> 'admin/home-02', 'titulo'=> 'Usuarios', 'depende'=> 0, 'data-label1'=> '');
		$menu['admin']['items'][3] = array('ref'=> 'admin/home-03', 'titulo'=> 'Página Principal 3', 'depende'=> 0, 'data-label1'=> '');
		$menu['admin']['items'][4] = array('ref'=> 'admin/product', 'titulo'=> 'Menus', 'depende'=> 99, 'data-label1'=> 'hot');
		$menu['admin']['items'][5] = array('ref'=> 'admin/shoping-cart', 'titulo'=> 'Contenido del sitio', 'depende'=> 99, 'data-label1'=> '');
		$menu['admin']['items'][6] = array('ref'=>'admin/blog', 'titulo'=>  'Blog', 'depende'=> 99, 'data-label1'=> '');
		$menu['admin']['items'][7] = array('ref'=>'admin/about','titulo' => 'Sobre Nosotros', 'depende'=> 99, 'data-label1'=> '');
		$menu['admin']['items'][8] = array('ref'=>'admin/contact', 'titulo'=>'Contacto', 'depende'=> 99, 'data-label1'=> '');


  	$menu['all']['items'][0] = array('ref'=> 'index', 'titulo'=> 'Inicio', 'depende'=> 99, 'data-label1'=> '');
	$menu['all']['items'][1] = array('ref'=> 'home/logica', 'titulo'=> 'Logica y téoria de los conjuntos', 'depende'=> 0, 'data-label1'=> '');
	$menu['all']['items'][2] = array('ref'=> 'home/relaciones', 'titulo'=> 'Relaciones', 'depende'=> 0, 'data-label1'=> '');
	$menu['all']['items'][3] = array('ref'=> 'home/funciones', 'titulo'=> 'Funciones', 'depende'=> 0, 'data-label1'=> '');
	$menu['all']['items'][4] = array('ref'=> 'home/product', 'titulo'=> 'Tienda', 'depende'=> 99, 'data-label1'=> 'hot');
	$menu['all']['items'][5] = array('ref'=> 'home/shoping-cart', 'titulo'=> 'Caracteristicas', 'depende'=> 99, 'data-label1'=> '');
	$menu['all']['items'][6] = array('ref'=>'news', 'titulo'=>  'Blog', 'depende'=> 99, 'data-label1'=> '');
	$menu['all']['items'][7] = array('ref'=>'home/about','titulo' => 'Sobre Nosotros', 'depende'=> 99, 'data-label1'=> '');
	$menu['all']['items'][8] = array('ref'=>'home/contact', 'titulo'=>'Contacto', 'depende'=> 99, 'data-label1'=> '');
	$menu['clases'] = array('clase_div' => 'menu-desktop', 'clase_ul' => 'main-menu', 'header_menu'=> '');
	$menu['css']['movil']['icon-login']= 'icon-header-item  cl2 hov-cl1 trans-04 p-r-11 ';
	$menu['css']['desktop']['icon-login']= 'icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 ';
	$menu['css']['movil']['icon-search']= 'icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search';
	$menu['css']['desktop']['icon-search']= 'icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search';
	$menu['css']['movil']['icon-cart']= 'icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart';
	$menu['css']['desktop']['icon-cart']= 'icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart';
	$menu['css']['movil']['icon-header']= 'icon-header-item dis-block  cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti';
	$menu['css']['desktop']['icon-header']= 'icon-header-item dis-block  cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti';
	$menu['notif_deseos']=3;
	$menu['notif_cart']=4;
	$menu['url_logo']='images/icons/logo-01.png';
	$menu['oferta_top_izq']='Envio Gratis para compras de hasta $100';
	$menu['top_menu']['help']['titulo']=  'Ayuda & Preguntas Frecuentes &nbsp; <span class=" fa fa-question-circle" aria-hidden="true"></span>';
	$menu['top_menu']['help']['ref']= 'home/faq';
	$menu['top_menu']['login']['titulo']= 'Mi Cuenta'; 
	$menu['top_menu']['login']['ref']='#';
	$menu['top_menu']['login']['sub-items']=array(array('permiso'=> '1', 'session'=> 0, 'cd'=> 'session_start','titulo'=> 'Iniciar Sesión', 'ref'=> '#modal_login', 'logo'=> '<i class="fa fa-sign-in" aria-hidden="true"> </i>'),
                                                  array('permiso'=> '1', 'session'=> 0, 'cd'=> 'register','titulo'=> 'registrarse', 'ref'=> '#modal_registrarse', 'logo'=> '<i class="fa fa-user-plus" aria-hidden="true"> </i>'),
												  array('permiso'=> '1','session'=> 1, 'cd'=> 'session_close','titulo'=> 'Cerrar Sesión', 'ref'=> 'usuarios/user_logout', "logo"=> '<i class="fa fa-sign-out" aria-hidden="true"></i>'),
												  array('permiso'=> '1','session'=> 1, 'cd'=> 'admin_my','titulo'=> 'Mi información', 'ref'=> 'usuarios/edit_user', "logo"=> '<i class="fa fa-edit"></i>'), 
												  array('permiso'=> '2','session'=> 1, 'cd'=> 'admin_site','titulo'=> 'Administrar el sitio', 'ref'=> 'admin/admin_site', "logo"=> '<i class="fa fa-edit"></i>'),
                                                  array('permiso'=> '1','session'=> 1, 'cd'=> 'msn','titulo'=> 'Mensajes', 'ref'=> 'msn_user', "logo"=> '<i class="fa fa-envelope" aria-hidden="true"></i>', 'cantidad'=> 3),
												);
	$menu['top_menu']['idioma']['lista']= array( array('titulo'=> 'Español', 'val'=> 0),
												 array('titulo'=> 'Aleman', 'val'=> 1),
												 array('titulo'=> 'Ingles', 'val'=> 2),
												 array('titulo'=> 'Portugues', 'val'=> 3), 
												 array('titulo'=> 'Italiano', 'val'=> 4), 
												 array('titulo'=> 'Frances', 'val'=> 5), 
												 
												 );  
	$menu['top_menu']['moneda']['lista']= array(
										array('titulo'=> 'USD', 'val'=> 0),
										array('titulo'=> 'ARS', 'val'=> 1),
										array('titulo'=> 'AUD', 'val'=> 2),
										array('titulo'=> 'AWG', 'val'=> 3),
										array('titulo'=> 'CAD', 'val'=> 4),
										array('titulo'=> 'CHF', 'val'=> 5),
										array('titulo'=> 'JPY', 'val'=> 6),
										array('titulo'=> 'NZD', 'val'=> 7),
										array('titulo'=> 'EUR', 'val'=> 8),
										array('titulo'=> 'GBP', 'val'=> 9),
										array('titulo'=> 'SEK', 'val'=> 10),
										array('titulo'=> 'DKK', 'val'=> 11),
										array('titulo'=> 'NOK', 'val'=> 12),
																						);										
										
										
						
	return $menu;	
      
	
	
}

}
