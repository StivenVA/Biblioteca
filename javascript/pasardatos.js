$(document).on("click","#botontabla",function (){
    var nombre= $(this).data('nombre');
    var codigo = $(this).data('codigo');
    
    $("#recibirnombre").val(nombre);
    $("#recibircodigo").val(codigo);

})