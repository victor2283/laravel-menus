@extends('layouts.app_new')
@section('content')
        @component('layouts.templates.frm_register_user')
             @slot('contenido')
                <div class ="container"> 
                                <div class="card text-center grd-1 grd-sombra">
                                        <div class="card-header">
                                                        @component('layouts.templates.form_register_user.header') @endcomponent
                                                        
                                        </div>
                                        <div class="card-body">
                                                        @php 
                                                                $archivo ='pg_archivo';
                                                                $caja ="pg_caja";
                                                                $mostrar= "pg_mostrar";
                                                                $binario_img = "pg_binario_img";
                                                                $fileDisplayArea ="pg_fileDisplayArea";
                                                        @endphp
                                                        @component('layouts.templates.form_register_user.body', compact('archivo', 'caja', 'mostrar', 'binario_img', 'fileDisplayArea'))
                                                                
                                                        @endcomponent
                                                        <div class ="container center"> 
                                                                @component('layouts.templates.form_register_user.footer')  @endcomponent
                                                        </div>
                                        </div>
                                </div>
                </div>
            @endslot    
        @endcomponent
 @endsection
