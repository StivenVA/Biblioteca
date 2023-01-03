$(document).on("click","#botoneliminarnotas",function (){
    var nota= $(this).data('nota');
    var descrip = $(this).data('descrip');
    
    $("#botonrecibireliminar").val(nota);
    $("#recibirdescrip1").val(descrip);

})