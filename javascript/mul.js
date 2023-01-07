$(document).ready(function () {
    $('#table').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ por página",
            "zeroRecords": "No tiene multas pendientes",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search":"Buscar:",
            'paginate':{
                'next':'Siguiente',
                'previous': 'Anterior'
            }
        }
    });
});