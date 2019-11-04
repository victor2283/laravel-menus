

<style>

</style>
<div class="btn-group"> 
    <a href="home/faq" class="btn text-white  btn-dark">Ayuda & Preguntas Frecuentes &nbsp; 
        <span class=" fa fa-question-circle" aria-hidden="true"></span>	 
    </a> 
</div> 
@component('layouts.templates.header.topbar.menu_auth',['session'=> $session])
@endcomponent
@if((($session['sesion_iniciada']==true) && ($session['permiso']->permiso==1 || $session['permiso']->permiso==2)))
        <div class="btn-group btn-dark"> 
            
            @component('layouts.templates.header.topbar.languages', compact('items_idiomas')) @endcomponent
            
        </div>
        <div class="btn-group btn-dark"> 
            
            @component('layouts.templates.header.topbar.money', compact('items_moneda')) @endcomponent

        </div>
@endif