//cargar las tablas

$.ajax({
    url: "../../ajax/info-destino1.php",
    dataType: "json",
    success: function (respuesta) {
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i = 0; i < respuesta.total; i++) {
            $("#tabla-destino").append(
                `<div  class="card w-50">
                <div class="card-body">
                <h5  class="card-title">${respuesta[i].nombre}</h5>
                
                <button onclick="flujo(this)" value="${respuesta[i].nombre}" class="btn btn-primary mt-4" >Seleccionar</button>
                </div>`
            );
        }
    },
    error: function (error) {
        console.log(error);
    }
});




