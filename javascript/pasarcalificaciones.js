$(document).on("click","#botontablacalificaciones",function (){
    var valorNota= $(this).data('nota');
    var cod_cal = $(this).data('cod_cal');
    
    $("#recibirvalor").val(valorNota);
    $("#recibircod_cal").val(cod_cal);

})