@extends('base')

@section('contenido')
    <div class="row mt-3">
        <div class="col-md-4 offset-md-4">
            <div class="d-grid mx-auto">
                <button type="button" class="btn btn-dark" data-op="1" data-bs-toggle="modal" data-bs-target="#nuevo_usuario"><i class="fa-solid fa-circle-plus"></i> Nuevo Usuario</button>
            </div>
        </div>
    </div>    


    <div class="row mt-3">
        <div class="col-12 col-lg-8 offset-0 offset-lg-2">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>nombre</th>
                            <th>apellido</th>
                            <th>correo</th>
                            <th>admin</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $id = 1 @endphp
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td> {{ $id++}} </td>
                                <td> {{ $usuario->nombre }} </td>
                                <td> {{ $usuario->apellido }} </td>
                                <td> {{ $usuario->email }} </td>
                                <td> @if($usuario->admin == 0) False @else True @endif </td>
                                <td> <a href="{{ url('usuarios',[$usuario]) }}" class="btn btn-warning" ><i class="fa-solid fa-pencil"></i></a> </td>
                                <td>
                                    <form class="deleteFormUsuario" method="POST" action="{{ url('usuarios',[$usuario])}}">
                                        @method('delete')
                                        @csrf
                                        <button  class="submitFormDeleteUsuario btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>                                     
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="nuevo_usuario" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="h5" id="titulo_modal"> Nuevo Usuario </label>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmnuevousuario" method="POST" action="{{ url("usuarios")}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="text" name="nombre" class="form-control" maxlength="100" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="text" name="apellido" class="form-control" maxlength="100" placeholder="Apellido" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="number" name="edad" class="form-control" maxlength="3" placeholder="Edad" required>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="text" name="email" class="form-control" maxlength="100" placeholder="correo@ejemplo.com" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="password" name="password" class="form-control" maxlength="100" placeholder="contraseña" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="password" name="confirm_password" class="form-control" maxlength="100" placeholder="confirmar contraseña" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                    <input class="form-check-input mt-0" type="checkbox" name="admin">
                                    </div>
                                    <input type="text" class="form-control" value="Administrador" disabled>
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        
                        
                        
                        <div class="d-grid col-6 mx-auto">
                            <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCerrar" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar </button>
                </div>
            </div>
        </div>
    </div> 
    <script src="{{ url('assets/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ url('assets/js/usuarios.js') }}"></script>
    <script>
        $(document).ready(function(){
            let admin = {{ auth()->user()->admin }};
            if(!admin){
                window.location.href = '/';
            }
        });

    </script>
@endsection