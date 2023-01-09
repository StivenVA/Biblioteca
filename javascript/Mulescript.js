
$(document).on("click","#botontabla",function (){
    var titulo= $(this).data('titulo');
    var user = $(this).data('user');
    var ejem = $(this).data('cod');
    var fecha = $(this).data('fecha');
    
    $("#titulo").val(titulo);
    $("#aceptar").val("cod_ejem='"+ejem+"'"+" and cod_usuario='"+user+"'"+" and fecha_pres='"+fecha+"'");
})