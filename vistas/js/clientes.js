$(".btnCargarDatos").click(function(){
    var idClientes = $(this).attr("idClientes");
    
    var datos = new FormData();
    datos.append("idClientes", idClientes);
    datos.append("edit", edit);
    console.log("Datos id",edit);

    $.ajax({
       url: "ajax/ajaxclientes.php", 
       method: "POST",
       data: datos,
       cache: false , 
       contentType: false ,
       processData: false, 
       dataType: "json" , 
       success: function(respuesta){
         console.log("Datos json",respuesta);
       }
    });
})