@php 
if(!isset($items_moneda)){
$items_moneda = array(
    
    'AUD',
    
);
}

@endphp
<select class="top_menu_lista">
                                                                
   @foreach ($items_moneda as $item)
    <option>{{$item}}</option>   
   @endforeach
                                                                
 </select> 