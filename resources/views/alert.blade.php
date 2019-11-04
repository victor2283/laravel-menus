<div class="alert alert-danger">
        <div class="alert-title">@if(!isset($title)) {{('titulo')}} @else{{$title}}   @endif</div>   
    {{ $slot }}
</div>