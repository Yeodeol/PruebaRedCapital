$(document).ready(function(){
    $('.submitFormDeleteUsuario').on('click', function(event){
        event.preventDefault();
        console.log('detenido antes de')
        Swal.fire({
            title: 'Estas Seguro',
            text: "Que deseas eliminar este usuario=",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText:'No',
            confirmButtonText: 'Si'
          }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest('.deleteFormUsuario').submit();
            }
          })
    });
});