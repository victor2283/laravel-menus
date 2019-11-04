@php 
if(!isset($interfaz)){
 $interfaz = "desktop";
}
@endphp
@if($interfaz =="desktop") 
    <div class="top-bar grd-top-mbl">  {{-- grd-top-dsk --}}
            <div class="content-topbar flex-sb-m h-full container"> 
                    <div class="left-top-bar text-center text-white"> 
                        @component('layouts.templates.header.topbar.advertising') @endcomponent
                    </div>
                    <div class="right-top-bar flex-w h-full">
                           
                           @component('layouts.templates.header.topbar.menu_top_right', compact('session', 'interfaz', 'items_moneda', 'items_idiomas')) @endcomponent
                    </div>	 
            </div> 
    </div>
@else 
        <ul class="topbar-mobile"> 
                <li> 
                    <div class="left-top-bar grd-top-mbl"> 
                       <span class ="text-white"> @component('layouts.templates.header.topbar.advertising')   @endcomponent </span>
                    </div> 
                </li> 
                <li> 
                    <div class="right-top-bar flex-w h-full">
                        @component('layouts.templates.header.topbar.menu_top_right', compact('session', 'interfaz', 'items_moneda', 'items_idiomas')) @endcomponent
                    </div>
                </li> 
        </ul>
@endif