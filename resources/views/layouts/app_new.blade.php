@php
	$session_mensajes = array(); 
	if (session()->has('mensajes_form')) {
		$session_mensajes = session()->get('mensajes_form');
	}	
	
	$items_idiomas = array(
    'Español',
    'Aleman',
    'Ingles',
    'Portugues',
    'Italiano',
    'Frances',
	);
	$items_moneda = array(
		'ARS',
		'AUD',
		'AWG',
		'CAD',
		'CHF',
		'JPY',
		'NZD',
		'EUR',
		'GBP',
		'SEK',
		'DKK',
		'NOK',
	);  
   $items_menu =
            array(
                array('route'=>array('home', ''), 'titulo'=> 'Inicio', 'depende' => array(
                    array('route'=>array('home.ruta', 'logica'), 'titulo'=> 'Logica y teória de los conjuntos', 'depende'=> ''),
                    array('route'=> array('home.ruta','relaciones'), 'titulo'=> 'Relaciones', 'depende'=> ''),
                    array('route'=> array('home.ruta','funciones'), 'titulo'=> 'Funciones', 'depende'=> array(
                        array('route'=> array('home.ruta','product'), 'titulo'=>'T1', 'depende'=> ''),
                        array('route'=> array('home.ruta','product'), 'titulo'=>'T2', 'depende'=> ''),
                        array('route'=> array('home.ruta','product'), 'titulo'=>'T3', 'depende'=> ''),
                    ))
                                                                                    )
                    ),
                array('route'=> array('home.ruta','product'), 'titulo'=>'Tienda', 'depende'=> ''),	
                array('route'=> array('home.ruta','shoping-cart'), 'titulo' => 'Caracteristicas', 'depende'=> ''),	
                array('route' => array('home.news', ''), 'titulo'=> 'Blog', 'depende'=> ''),
                array('route'=> array('home.ruta','about'), 'titulo'=>'Sobre Nosotros', 'depende'=> ''),
                array('route'=> array('home.ruta','contact'), 'titulo'=> 'Contacto', 'depende'=> '')
                );
				if(!isset($icon_shopping_cart_notif)){
					$icon_shopping_cart_notif = 3;
				}
				if(!isset($icon_favorite_outline)){
					$icon_favorite_outline = 2;
				}
			  $session = session()->get('login')


@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	@component('layouts.templates.head') @endcomponent
	
	<body>
		{{-- <div class = "container-fluid "> --}}
			<div class ="animsition">
						
								@component('layouts.templates.header', compact('items_menu', 'icon_shopping_cart_notif', 'icon_favorite_outline', 'session', 'items_moneda', 'items_idiomas')) @endcomponent
								<!-- --------------------------------------- --> 
			
			
						<!-- Modal HTML login --> 
								@component('layouts.modals.login_modal') @endcomponent
						<!-- Fin Modal HTML login --> 
			
			
						<!--restablecer contraseña-----------------------------------------------> 
								@component('layouts.modals.password_reset') @endcomponent
						<!--Fin restablecer contraseña-----------------------------------------------> 
			
			
						{{-- inicio registrar --}}	
			
								@component('layouts.modals.register_user') @endcomponent
						{{-- fin registro  --}}		
			
								
						{{-- 		inicio - carrito --}}
										
								@component('layouts.modals.header-cart') @endcomponent	
						        
						{{-- fin carrito --}} 
						
						
						@component('alert_pri', compact('session_mensajes')) @endcomponent

							@if (Request::url() == route('home'))
								@yield('content')
							@else 
								<div class="py-2">
									@yield('content')	
								</div>    
							@endif
					
							
			
				{{-- <footer> --}}
					@component('layouts.templates.footer') @endcomponent
				{{-- </footer> --}}
			</div>
		{{-- </div> --}}
	</body>
	

</html>
