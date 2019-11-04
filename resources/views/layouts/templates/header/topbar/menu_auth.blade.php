
                        {{-- @component('layouts.templates.header.topbar.menu_auth', ['session'=> $session]) @endcomponent --}}
                        <div class="btn-group"> 
                                    <!-- Authentication Links -->
                                
                                <a href="#" class="btn btn-dark text-white dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Mi Cuenta</a>     
                                
                                
                                <ul class="dropdown-menu"> 
                                    @if(!(($session['sesion_iniciada']==true) && ($session['permiso']->permiso==1 || $session['permiso']->permiso==2)))
                                                <a class="dropdown-item" data-toggle="modal" data-target="#modal_login" href="#"> Iniciar Sesión&nbsp;
                                                    <i class="fa fa-sign-in" aria-hidden="true"> </i> 
                                                </a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#modal_registrarse" href="#"> Registrarse&nbsp;
                                                    <i class="fa fa-user-plus" aria-hidden="true"> </i> 
                                                </a>
                                    @else
                                                <a class="dropdown-item" href="{{ route('user.logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Cerrar Sesión') }}
                                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                                </a>
                                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <a class="dropdown-item" href="usuarios/edit_user">Mi información&nbsp;
                                                        <i class="fa fa-edit"></i> 
                                                </a>
                                                <a class="dropdown-item" href="admin/admin_site">Administrar el sitio&nbsp;
                                                    <i class="fa fa-edit"></i> 
                                                </a>
                                                <a class="dropdown-item" href="msn_user">Mensajes&nbsp;
                                                    <i class="fa fa-envelope" aria-hidden="true"></i> 
                                                </a>
                                    @endif	
                                </ul> 
                        </div>