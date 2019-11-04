<!--restablecer contraseña-----------------------------------------------> 
<div id="password_request" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" > 
        <div class="modal-dialog"> 
            <div class="modal-content"> 
                <div class ="modal-header">
                    <div class="card-header">{{ __('Resetear su contraseña') }}</div>
                    @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                        <span aria-hidden="true">&times;</span> 
                    </button>  
                </div>
                <div class ="modal-body">
                        <form method="POST" action="{{ route('user.restore_psw') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Dirección de E-Mail') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enviar enlace de restablecimiento de contraseña') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
    
            </div><!-- /.modal-content --> 
        </div><!-- /.modal-dialog --> 
    </div><!-- /.modal -->   
    <!--Fin restablecer contraseña-----------------------------------------------> 