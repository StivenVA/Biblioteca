
$(document).on("click","#botontabla",function (){
    var titulo= $(this).data('titulo');
    var user = $(this).data('user');
    var ejem = $(this).data('cod');
    
    $("#titulo").val(titulo);
    $("#aceptar").val("cod_ejem='"+ejem+"'"+" and cod_usuario='"+user+"'");
})