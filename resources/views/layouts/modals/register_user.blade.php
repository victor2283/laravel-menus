
     @component('layouts.templates.frm_register_user')
          @slot('contenido')
            <div class="modal fade" tabindex="-8881" role="dialog" id="modal_registrarse">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                @component('layouts.templates.form_register_user.header') @endcomponent
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                                        <span aria-hidden="true">&times;</span> 
                                </button> 
                            </div>
                            <div class="modal-body">
                                @php 
                                        $archivo ='md_archivo';
                                        $caja ="md_caja";
                                        $mostrar= "md_mostrar";
                                        $binario_img ="md_binario_img";
                                        $fileDisplayArea = "mb_fileDisplayArea";
                                @endphp
                                    <div class ="container center"> 
                                        @component('layouts.templates.form_register_user.body', compact('archivo', 'caja', 'mostrar', 'binario_img', 'fileDisplayArea'))
                                            
                                        @endcomponent
                                        
                                        @component('layouts.templates.form_register_user.footer')   @endcomponent
                                    </div>
                                    
                            </div>
                    </div>
                </div>
            </div>
        @endslot
     @endcomponent
