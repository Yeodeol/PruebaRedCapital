@extends('base')

@section('contenido')
    <div class="row mt-3">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white">Editar Producto
                </div>
                <div class="card-body">
                    <form id="frmnuevoproducto" method="POST" action="{{ url("productos",[$producto])}}">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="text" name="sku" value="{{ $producto->sku }}" class="form-control" maxlength="100" placeholder="sku001" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" maxlength="100" placeholder="producto1" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="number" name="precio_unitario" value="{{ $producto->precio_unitario }}" class="form-control" maxlength="3" placeholder="10.000" required>
                                </div>
                            </div>
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