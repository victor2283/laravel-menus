
<!-- Modal HTML login --> 
<div id="modal_login" class="modal fade"  role="dialog" tabindex="78999" aria-labelledby="myModalLabel" aria-hidden="true"> 
        <div class="modal-dialog"> 
        <div class="modal-content"> 
        <div class="modal-header"> 
            <h4 class="modal-title text-xs-center">{{ __('Iniciar sesión') }}</h4> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                <span aria-hidden="true">&times;</span> 
            </button> 
        </div> 
        <div class="modal-body"> 
            <form method="POST" action="{{ route('user.login') }}">
                    @csrf
            
                <div class="form-group"> 
                    <label class="col-md-4 col-form-label text-md-right">{{ __('Correo eléctronico') }}</label> 
                    <div> 
                        <input id="email" type="email" class="form-control input-lg @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" required autocomplete="email" autofocus /> 
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div> 
                </div> 
                <div class="form-group"> 
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                    <div>
                            <input id="password" type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    
                </div> 
                <div class ="container">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="remember" {{ old('recuerdame') ? 'verifique' : '' }} value="">
                                <label class="form-check-label" for="remember">{{ __('Recuerdame') }}</label>
                            </div>
                </div>
                
                
                
                
                <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Iniciar Sesión') }}
                            </button>

                            
                                <a id="ocultarmodal" class="btn btn-link" href="password.request" data-toggle="modal" data-target="#password_request" id="restablecer_psw_click"> {{ __('¿Olvido su contraseña?') }}</a> {{-- href="{{ route('password.request') }}" --}}
                                    
                            
                        </div>
                </div>
                
            </form> 
        </div> 
        <div class="modal-footer text-xs-center"> 
            <p>  ¿No estás registrado? </p>  
            <p> <a href="#" data-toggle="modal" data-target="#modal_registrarse" class=""  style="color:#000080;font-weight:900;"> <span> <span> Registrarse »</a></p> 
        </div> 
        </div><!-- /.modal-content --> 
        </div><!-- /.modal-dialog --> 
</div><!-- /.modal --> 
<!-- Fin  Modal HTML login --> 