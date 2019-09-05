/* var parametros="nombre="+$("#nombre").html(); */

    $.ajax({
        url: "ajax/base-datos-dw2.php",
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);
            console.log(respuesta["total"]);
        for (var i = 0; i < respuesta.total; i++) {
            $("#tablas").append(
                `<div class="card w-50">
                <div class="card-body">
                <h5 class="card-title">${respuesta[i].nombre}</h5>
                
                <a href="#" class="btn btn-primary">Button</a>
                </div>`
            );
        }
    },
    error: function(error) {
        console.log(error);
    }
});

