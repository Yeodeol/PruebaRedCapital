@extends('base')

@section('contenido')
    <div class="row mt-3">
        <div class="col-md-4 offset-md-4">
            <div class="d-grid mx-auto">
                <button type="button" class="btn btn-dark" data-op="1" data-bs-toggle="modal" data-bs-target="#nuevo_producto"><i class="fa-solid fa-circle-plus"></i> Nuevo Producto</button>
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
                            <th>SKU</th>
                            <th>Nombre</th>
                            <th>Precio Unitario</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $id = 1 @endphp
                        @foreach ($productos as $producto)
                            <tr>
                                <td> {{ $id++}} </td>
                                <td> {{ $producto->sku }} </td>
                                <td> {{ $producto->nombre }} </td>
                                <td> {{ $producto->precio_unitario }} </td>
                                <td> <a href="{{ url('productos',[$producto]) }}" class="btn btn-warning" ><i class="fa-solid fa-pencil"></i></a> </td>
                                <td>
                                    <form class="deleteFormProducto" method="POST" action="{{ url('productos',[$producto])}}">
                                        @method('delete')
                                        @csrf
                                        <button  class="submitFormDeleteProducto btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>                                     
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="nuevo_producto" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="h5" id="titulo_modal"> Nuevo Producto </label>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmnuevoproducto" method="POST" action="{{ url("productos")}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="text" name="sku" class="form-control" maxlength="100" placeholder="SKU" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="text" name="nombre" class="form-control" maxlength="100" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <input type="number" name="precio_unitario" class="form-control" maxlength="3" placeholder="100.000" required>
                                </div>
                            </div>
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
@endsection