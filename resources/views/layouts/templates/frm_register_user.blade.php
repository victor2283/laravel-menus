
<form  role="form" method="POST" action="{{ route('user.register_user') }}" enctype="multipart/form-data"> 
    @csrf
    {{$contenido}}
</form>    
