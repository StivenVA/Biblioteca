$(document).on("click","#botonedittablanotas",function (){
    var nota= $(this).data('nota');
    var descrip = $(this).data('descrip');
    var porcentaje = $(this).data('porcentaje');
    
    $("#recibirenbotonposi").val(nota);
    $("#recibirposicion").val(nota);
    $("#recibirdescrip").val(descrip);
    $("#recibirporcentaje").val(porcentaje);

})