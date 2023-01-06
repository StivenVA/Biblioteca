$(document).ready(function () {
    $('#example').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ libros por página",
            "zeroRecords": "",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search":"Buscar:",
            'paginate':{
                'next':'Siguiente',
                'previous': 'Anterior'
            }
        }
    });
});