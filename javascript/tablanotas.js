$(document).ready(function () {
    $('#tablanotas').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ estudiantes por página",
            "zeroRecords": "No hay notas - Inscribalos!",
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