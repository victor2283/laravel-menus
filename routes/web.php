<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('error', function(){ 
    abort(500);
});
 */




Route::post('user/login', 'Usuarios@login_verifico')->name('user.login');
Route::get('user/form_login', 'Usuarios@form_login')->name('user.form_login');
Route::get('user/restore_psw', 'Usuarios@restore_psw')->name('user.restore_psw');
Route::post('user/register_user', 'Usuarios@register_user')->name('user.register_user');
Route::get('user/form_register_user', 'Usuarios@form_register_user')->name('user.form_register_user');
Route::post('user/logout', 'Usuarios@user_logout')->name('user.logout');


Route::get('blog/{news_slug}', 'News@rutas')->name('news_slug.slug');
Route::get('blog', 'News@index')->name('home.news');



Route::get('{any?}', 'HomeController@index')->name('home');
Route::get('{any?}/', 'HomeController@index')->name('home');
Route::get('home/{pagina?}', 'HomeController@rutas')->name('home.ruta');



/* 
Route::get('fotos/{numero?}', function($numero=false){
    return 'bienvenido a la galeria de fotos:'.$numero;
});

Route::get('user/{name?}', function ($name=''){
   if($name==''){
       return 'No escribio nombre';
   } return 'tu nombre es: '.$name;
})->where('name', '[A-Za-z]+');

Route::get('user/{id?}', function ($id=false) {
    if($id){
return 'el id: '. $id; 
    }else{
        'no se ha ingresado id'. $id;
    }
})->where('id', '[0-9]+');

Route::get('user/{id?}/{name?}', function ($id=0, $name=false) {
    if($id>0 && $name){
            return 'su id es:'. $id. '/ y se llama '. $name.'.';
    }else{
        return 'echo ruta invalida.';
    }
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
Route::view('galeria', 'galeria', ['numero'=> 125]); */


/* Route::get('create_sitemap', "XmlSitemap::create_sitemap"); */
/* Route::get('create_static_sitemap', "XmlSitemap::create_static_sitemap");
Route::get('create_sitemapIndex','XmlSitemap::create_sitemapIndex');
Route::get('run_sitemap', "XmlSitemap::index");
Route::get('get_urlsite', "XmlSitemap::get_urlsite");
Route::get('scandir_sitemap', "XmlSitemap::scandir_sitemap");
 */


/* Route::get('imagenes/imagen_logo/(:any)', 'Imagenes::imagen_logo/$1');
Route::get('imagenes/imagen_logo', 'Imagenes::imagen_logo');
Route::get('imagen_logo/(:any)', 'Imagenes::imagen_logo/$1');
Route::get('vista_img/(:any)', 'Imagenes::vista_img/$1');
Route::get('imagenes/vista_img/(:num)', 'Imagenes::vista_img/$1');
Route::get('mostrar_imagen/(:any)', 'Imagenes::mostrar_imagen/$1');
Route::add ('imagenes/(:segment)', 'Imagenes::$1');
 */

/* Route::get('usuarios/reg_user', 'Usuarios::reg_user'); //por las dudas 
Route::get('usuarios/(:segment)', 'Usuarios::$1/$2');
 */
/* Route::get('admin/admin_site', 'Admin_site::index');
Route::get('usuarios/edit_user', 'Usuarios::edit_user');
Route::get('usuarios/msn_user', 'Usuarios::msn_user');
 */

/* Route::get('news', 'News::index');
Route::get('news/(:segment)', 'News::rutas/$1');
 */


/* Route::get('index', 'Home::index');
Route::get('/', 'Home::index');
Route::get('home/(:any)', 'Home::rutas/$1');
 */
