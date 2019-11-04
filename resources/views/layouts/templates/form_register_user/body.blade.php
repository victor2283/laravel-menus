@php session()->put('var_binario', '');  

@endphp

@component('css_img_caja', compact('mostrar', 'caja')) @endcomponent
            <input type="hidden" class="form-control input-lg" id="pk_usuario" name="pk_usuario" />   
                <div class ="row"> 
                    <div class =" col-lg-5">  
                        <div class="form-group"> 
                            <label for="username" class="text-black"> 
                                    Nombre de usuario<span class="text-danger">*</span> 
                            </label> 
                            
                            <input  id="username" type="text" placeholder = "Ingrese el nombre de usuario" 
                                class="form-control input-lg @error('username') is-invalid @enderror" 
                                name="username" value="{{ old('username') }}" 
                                required autocomplete="username" autofocus>
                                
                        </div>  
                    <div class="form-group"> 
                            <label for="psw" class="text-black"> 
                                    Contraseña <span class="text-danger">*</span> 
                            </label> 
                            <input type="password"  id="psw"  placeholder = "ingrese su contraseña" 
                                class="form-control input-lg 
                                @error('psw') is-invalid 
                                @enderror" 
                                name="psw" 
                                @if ($errors->has('psw'))
                                  value=""  
                                @else
                                   value="{{ old('psw') }}"
                                @endif
                                required autocomplete="new-password">
                                @error('psw')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror  
                                
                    </div> 
                        <div class="form-group"> 
                            <label for="pswconfirm" class="text-black"> 
                                Repetir la Contraseña <span class="text-danger"> *</span> 
                            </label> 
                            <input type="password" id="password-confirm" placeholder = "repita su contraseña"
                              class="form-control input-lg 
                              @error('pswconfirm') is-invalid 
                              @enderror" 
                              name="pswconfirm" 
                              @if ($errors->has('pswconfirm'))
                                value=""  
                              @else
                                value="{{ old('pswconfirm') }}"
                               @endif
                               required autocomplete="new-password">
                               @error('pswconfirm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror   
                        </div> 
                        <div class="form-group"> 
                            <label for="nombre" class="text-black"> 
                                Nombre<span class="text-danger">*</span> 
                            </label> 
                            <input type="text" id="nombre" placeholder = "ingrese el Nombre"
                            class="form-control input-lg 
                            @error('nombre') is-invalid 
                            @enderror" 
                            name="nombre" value = "{{ old('nombre') }}"/>   
                        </div>     
                        <div class="form-group"> 
                            <label for="apellido" class="text-black"> 
                                Apellido<span class="text-danger">*</span> 
                            </label> 
                            <input type="text" id="apellido" placeholder = "ingrese el Apellido"
                            class="form-control input-lg 
                            @error('apellido') is-invalid 
                            @enderror" name="apellido" 
                            @if ($errors->has('apellido'))
                                value=""  
                            @else
                                value = "{{ old('apellido') }}"
                             @endif 
                            />
                            @error('apellido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror     
                        </div>     
                        <div class="form-group"> 
                            <label for="telefono" class="text-black"> 
                                Telefono<span class="text-danger">*</span> 
                            </label> 
                            <input type="text" class="form-control input-lg 
                            @error('telefono') is-invalid 
                            @enderror" id="telefono" 
                            name="telefono" placeholder = "ingrese el Telefono" 
                            value = "{{ old('telefono') }}"/>
                            @error('telefono')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror   
                        </div> 
                        <div class="form-group"> 
                                <label for="email" class="text-black"> 
                                        Email<span class="text-danger">*</span> 
                                </label> 
                                <input type="email" class="form-control input-lg @error('email') is-invalid @enderror" id="email" name="email" placeholder = "ingrese el Email" value="{{ old('email') }}" required autocomplete="email"/>   
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                        </div> 
                    </div> 
                    <div class="form-group col-lg-7" > 
                        <div class =" border border-dark"> 
                        <h4 class="text-center">Seleccione la imagen a cargar</h4>          
                        <div class="form-group"> 
                            <label class="col-sm-2 control-label">Archivos</label> 
                            <div class="custom-file col-sm-12"> 
                                <input  type="file" name="imagen" 
                                  id="@if(!isset($archivo)){{('archivo')}}@else{{$archivo}}@endif" 
                                  class="form-control" 
                                  value="{{ old('imagen') }}" />                                                                                              
                                
                                <input type="hidden" name="binario_img" 
                                id="@if(!isset($binario_img)){{('binario_img')}}@else{{$binario_img}}@endif" 
                            value="{{ old('binario_img') }}" /> 
                            </div> 
                        </div> 
                        <script>
                        </script>
                        <div class ="row">  
                            <div class ="col-1"> <span> </span> </div> 
                                    <div id="@if(!isset($caja)){{('caja')}}@else{{$caja}}@endif" 
                                        class ="@if(!isset($mostrar)){{('mostrar')}}@else{{$mostrar}}@endif col-10 border border-danger bg-secondary" style="background-image: url({{ old('binario_img') }})" >
                                    </div>
                                    <span> <hr></span>               
                                         <div class ="col-1"> 
                                            <span> </span> 
                                         </div> 
                                    </div>         
                            </div>
                        <div id="{{$fileDisplayArea}}"> </div>     
                        </div> 
                    </div> 
                    
                            
                            
                    <input type="hidden" class="form-control input-lg" id="fk_usuario" name="fk_usuario" /> 
            </div>   
            @component('js_img_caja',compact("archivo", "caja", 'binario_img', 'fileDisplayArea'))   @endcomponent