$(document).ready(function(){

    var enviando = false;

    $("#formulario").submit(function(e){
       
        e.preventDefault();

        if(enviando) return;

        enviando = true;

        var val = $("#campo").val(), result = $("#resultado");

        result.removeClass("error exito");

        $("[type='submit']").val("Enviando...");
        
        $.post("afiliados.php", {campo: val}, function(data){

            result.addClass(data.indexOf("Gracias") !== -1 ? "exito" : "error");
            result.html(data);
            $("[type='submit']").val("Enviar");

            enviando = false;
        });
      
    })
})