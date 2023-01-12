@extends('base')

@section('contenido')
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white">Editar Usuario
                </div>
                <div class="card-body">
                    <form id="frmnuevousuario" method="POST" action="{{ url("usuarios",[$usuario])}}">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="text" name="nombre" value="{{ $usuario->nombre }}" class="form-control" maxlength="100" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="text" name="apellido" value="{{ $usuario->apellido }}" class="form-control" maxlength="100" placeholder="Apellido" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="number" name="edad" value="{{ $usuario->edad }}" class="form-control" maxlength="3" placeholder="Edad" required>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="text" name="email" value="{{ $usuario->email }}" class="form-control" maxlength="100" placeholder="correo@ejemplo.com" required>
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
                                    <input class="form-check-input mt-0" type="checkbox" name="admin" @if($usuario->admin == 1) checked @endif>
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
            </div>
        </div>
    </div>
@endsection