
@php  

$clase_div_search = "icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search";
$clase_div_icon_user= "icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11";
$clase_div_icon_user_avatar = "icon-header-item  cl2 hov-cl1 trans-04 p-r-11"; 
$div_shopping_cart = "icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart";
$div_favorite_outline ="icon-header-item dis-block  cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti";           
if(!isset($icon_shopping_cart_notif)){

    $icon_shopping_cart_notif = 0;
}
if(!isset($icon_favorite_outline)){
    $icon_favorite_outline = 0;    
}
if(!isset($interfaz)){
        $interfaz = 'desktop';
        
 }else{
     if($interfaz !== 'desktop'){
        $clase_div_search = "icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search";
        $clase_div_icon_user ="icon-header-item  cl2 hov-cl1 trans-04 p-r-11";
        $clase_div_icon_user_avatar ="icon-header-item  cl2 hov-cl1 trans-04 p-r-11";
        $div_shopping_cart = "icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart";
        $div_favorite_outline ="icon-header-item dis-block  cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti";           
     }
     /* echo $interfaz; */
 } 
@endphp
<div class="{{$clase_div_search}}"> 
    <i class="zmdi zmdi-search"> </i> 
</div>
@if(!(($session['sesion_iniciada']==true) && ($session['permiso']->permiso==1 || $session['permiso']->permiso==2))) 
    <div class="{{$clase_div_icon_user}}">
        <a href="index" class ="" > 
            <i class="fa fa-user-circle" style="font-size:28px;color:black"> </i> 
        </a>
    </div>
@else
    <div class="{{$clase_div_icon_user_avatar}}">
            <span class ="stext-101" >  
                {{ $session['datos_usuario']->username }} <span class="caret"></span>  
            </span>
            <a href="mostrar_imagen/2"> 
                @if(isset($session['datos_usuario']->dato_binario))
                    <img src="{{$session['datos_usuario']->dato_binario}}" class ="avatar"> 
                @else
                   <i class="fa fa-user-circle" style="font-size:28px;color:black"> </i> 
                @endif
                
            </a>
    </div>
    <div class ="row">
        <div class="{{$div_shopping_cart}}" data-notify="{{$icon_shopping_cart_notif}}"> 
            <i class="zmdi zmdi-shopping-cart"> </i> 
        </div>
            <a href="#" class="{{$div_favorite_outline}}" data-notify="{{$icon_favorite_outline}}"> 
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
     </div>   
@endif
    


 
                        
                            
                                        
           
                            