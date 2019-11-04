@php 
  if(!isset($icon_shopping_cart_notif)){
    $icon_shopping_cart_notif = 0;
  }
  if(!isset($icon_favorite_outline)){
      $icon_favorite_outline = 0;
  }
@endphp
<!-- Header --> 
	<!-- etiqueta para que todo el menu quede centrado arriba y fijo --> 
	    {{--   grd-borde grd-sombra header-v2--}}
          <!-- fijo el menu a la parte superior  --> 
        {{-- <div class ="sticky-top grd-borde grd-sombra"> --}}
            {{-- @if (Request::is('/')) 

            @endif --}}
            @if (Request::url() == route('home'))
                <header>
            @else 
               <header class="header-v4">    
            @endif
                
                   
                        <!-- Header desktop --> 
                        
                            <div class="container-menu-desktop"> 
                                <!-- Topbar -->  
                                @php $interfaz = "desktop" @endphp
                                @component('layouts.templates.header.topbar', compact('session', 'interfaz', 'items_moneda', 'items_idiomas')) @endcomponent
                                <!--Fin  Topbar -->  
                        
                            @if (Request::url() == route('home'))
                                <div class="wrap-menu-desktop">
                            @else 
                                <div class="wrap-menu-desktop grd-1">
                            @endif
                                
                                
                                    <nav class="limiter-menu-desktop container"> 
                                            <!-- Menu desktop --><!-- Logo desktop -->		 
                                        <a class="navbar-brand text-dark" href="{{ url('/') }}">
                                            {{ config('app.name', 'Home') }}
                                        </a>
                                        @component('layouts.templates.header.menu_pri', compact('items_menu'))
                                            @slot('clase_menu')
                                                menu-desktop                  
                                            @endslot
                                        @endcomponent
                                        <div class="wrap-icon-header flex-w flex-r-m"> 
                                            @component('layouts.templates.header.menu_pri_right', ['session'=> $session, 'interfaz' => 'desktop', 'icon_shopping_cart_notif' => $icon_shopping_cart_notif, 'icon_favorite_outline' => $icon_favorite_outline]) @endcomponent
                                        </div> 
                                    </nav> 
                                </div>	 
                            </div> 
                        <!-- Header Mobile --> 
                        <div class ="fixed-top">
                            <div class="wrap-header-mobile grd-3"> 
                                <!-- Logo moblie -->		 
                                <div class="logo-mobile"> 
                                    <a class="navbar-brand text-dark" href="{{ url('/') }}">
                                            {{ config('app.name', 'Home') }}
                                    </a>
                                </div>
                                <div class="wrap-icon-header flex-w flex-r-m m-r-15"> 
                                    @component('layouts.templates.header.menu_pri_right', ['session'=> $session, 'interfaz' => 'mobile', 'icon_shopping_cart_notif' => $icon_shopping_cart_notif, 'icon_favorite_outline' => $icon_favorite_outline]) @endcomponent
                                </div> 
                                <!-- Button show menu --> 
                                <div class="btn-show-menu-mobile hamburger hamburger--squeeze"> 
                                    <span class="hamburger-box"> 
                                        <span class="hamburger-inner"></span> 
                                    </span> 
                                </div> 
                            </div> 
                        
                        
                            <!-- Menu Mobile --> 
                            <div class="menu-mobile">  
                                    @php $interfaz = "mobile" @endphp
                                    
                                    @component('layouts.templates.header.topbar', compact('session', 'interfaz', 'items_moneda', 'items_idiomas')) @endcomponent
                                    
                                    @component('layouts.templates.header.menu_pri', compact('items_menu'))
                                        @slot('clase_menu')
                                            menu-mobile                  
                                        @endslot
                                    @endcomponent
                            </div> 
                        
                        <!-- Modal Search --> 
                            @component('layouts.templates.header.modal_search')
                            @endcomponent
                        <!-- Fin Modal Search --> 
                
            </header>
        {{-- </div> --}}
        <!-- cierro el fixed top --> 