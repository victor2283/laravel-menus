@php 

if(!isset($items_idiomas)){
    $items_idiomas = array(
        'Español',
      
    );
}
@endphp
<select class="top_menu_lista"> 
    @foreach ($items_idiomas as $item)
        <option>{{$item}}</option>    
    @endforeach
</select> 