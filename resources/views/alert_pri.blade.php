
<style>
.alert{
    z-index:4600;
}
   </style>
@if(isset($session_mensajes) && !empty($session_mensajes))
    <div class="bg-light py-3"> 
            <div class="container"> 
                <div class="row"> 
                    <div class="col-md-12 mb-0"> 
                        <span class="mx-2 mb-0"> </span>'; 
                        @if(isset($session_mensajes["tipo_msg"]))
                            @if($session_mensajes["tipo_msg"]=='' || $session_mensajes["tipo_msg"]=='sc') 
                                    <div class="alert alert-success" role="alert alert-dismissible">
                            @else 
                                    <div class="alert alert-danger" role="alert alert-dismissible">
                            @endif 
                                {{ucfirst($session_mensajes['msg'])}} 
                        @endif    
                                <strong> </strong> 
                                       <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  
                                </div> 
                    </div> 
                </div> 
            </div> 
    </div> 
@endif