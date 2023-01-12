@extends('base')

@section('contenido')
    <div class="row mt-3">
        <div class="col-md-4 offset-md-4">
            <div class="d-grid mx-auto">
                <button type="button" class="btn btn-dark" data-op="1" data-bs-toggle="modal" data-bs-target="#nueva_cotizacion"><i class="fa-solid fa-circle-plus"></i> Nueva Cotización</button>
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
                            <th>Fecha de emisión</th>
                            <th>Total Bruto</th>
                            <th>Cantidad Productos</th>
                            <th>Creador</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $id = 1 @endphp
                        @foreach ($cotizacion_c as $cot)
                            <tr>
                                <td> {{ $id++}} </td>
                                <td> {{ $cot->fecha_emision }} </td>
                                <td> {{ $cot->total_bruto }} </td>
                                <td> {{ $cot->cantidad }} </td>
                                <td> {{ $cot->nombre }} {{ $cot->apellido }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="nueva_cotizacion" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="h5" id="titulo_modal"> Nueva Cotización </label>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmnuevaCotizacion" method="POST" action="{{ url("cotizaciones")}}">
                        @csrf
                    </form>

                        <div class="row">
                            <div class="col-md-6 offset-1">
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fa-solid fa-graduation-cap"></i></span>
                                    <select name="producto" id="producto" class="form-select" required>
                                        @foreach($productos as $producto)
                                            <option value="{{ $producto->id }}_{{ $producto->sku }}_{{ $producto->nombre }}_{{ $producto->precio_unitario }}">{{ $producto->nombre }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control cantidad" value="0" maxlength="2" placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group mb-3">
                                    <button class="btn btn-success agrega_producto"><i class="fa-solid fa-fa-plus"></i> Agregar </button>
                                </div>
                            </div>
                            
                        </div>
                        <table class="table table-striped" id="tblCotizacion">
                            <thead> 
                                <tr> 
                                    <th>sku</th>
                                    <th>Producto</th>
                                    <th>Precio Unitario</th>
                                    <th>Cantidad</th>
                                    {{-- <th>Eliminar</th> --}}
                                </tr>
                                {{-- <input type="number" name="cantidad" class="form-control cantidad" maxlength="2" placeholder="1" required> --}}
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-4 offset-4 mb-4">
                                <strong>Total Bruto actual : <label class="monto_bruto"></label></strong>
                            </div>
                        </div>
                        
                        <div class="d-grid col-6 mx-auto">
                            <button class="btn btn-success btnGuardarCotizacion"><i class="fa-solid fa-floppy-disk"></i> Guardar </button>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCerrar" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar </button>
                </div>
            </div>
        </div>
    </div> 
    
    <script src="{{ url('assets/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ url('assets/js/cotizaciones.js') }}"></script>
    <script src="{{ url('assets/js/base.js') }}"></script>
    <script>
        $('.btnGuardarCotizacion').on('click',function(e){
            let guardar = [] 
            $("#tblCotizacion tbody tr").each(function() {
    
                $sku =  $(this).find('td').eq(0).text();
                $Monto =  $(this).find('td').eq(2).text();
                $Cantidad = $(this).find('td').eq(3).text();


                guardar.push([$sku,$Monto,$Cantidad])

            });

            
            $.ajax({
                type:'POST',
                url:'save_cotizacion',
                data: {
                    user_id: {{ auth()->user()->id }},
                    total_bruto:$('.monto_bruto').text(),
                    productos:JSON.stringify(guardar),
                },
                success: function(data) {
                    //respuesta efectiva refrescamos
                    location.reload()
                }
            })
        })
    </script>
    
@endsection