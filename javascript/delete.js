$(document).on("click","#Delete",function (){
    var user = $(this).data('user');
    var ejem = $(this).data('cod');
    var fecha = $(this).data('fecha');
    
    $("#aceptar1").val("cod_ejem='"+ejem+"'"+" and cod_usuario='"+user+"'"+" and fecha_mul='"+fecha+"'");
})

$(document).on("click","#Edit",function (){
    var user = $(this).data('user');
    var ejem = $(this).data('cod');
    var fecha = $(this).data('fecha');
    
    $("#aceptar").val("cod_ejem='"+ejem+"'"+" and cod_usuario='"+user+"'"+" and fecha_mul='"+fecha+"'");
})