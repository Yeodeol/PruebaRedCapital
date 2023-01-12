$(document).ready(function(){
    $('.agrega_producto').on('click',function(e){

        let producto = $('#producto').val();
        let arrProducto = producto.split('_');
        let cantidad = $('.cantidad').val();

        if(cantidad > 0){
            if(validar_producto_en_cotizacion(arrProducto[2])){
                Swal.fire({
                    icon: 'error',
                    text: 'Producto Ya ingresado',
                  })
                $('.cantidad').val(0)
            }else{
                console.log('no se repite')
    
                var newRow = '<tr><td>'+arrProducto[1]+'</td><td>'+arrProducto[2]+'</td><td>'+arrProducto[3]+'</td><td>'+cantidad+'</td></tr>';
                $('#tblCotizacion tbody').append(newRow);
                $('.cantidad').val(0)    
                $('.monto_bruto').text(monto_bruto());
            }
        }else{
            Swal.fire({
                icon: 'error',
                text: 'Debe ingresar una cantidad',
              })
        }
    });
});


function monto_bruto(){

    let MontoxProducto = []
    $("#tblCotizacion tbody tr").each(function() {
    
        $Monto =  $(this).find('td').eq(2).text();
        $Cantidad = $(this).find('td').eq(3).text();

        MontoxProducto.push($Monto*$Cantidad);
    
    });
    return MontoxProducto.reduce((mont, val) => mont + val);
}

function validar_producto_en_cotizacion($input){
    let validador = false
    $("#tblCotizacion tbody tr").each(function() {
        if($input == $(this).find('td').eq(1).text()){ validador = true }
    });

    return validador
}