//cargar las columnas
$.ajax({
    url: "../../ajax/info-destino2.php",
    dataType: "json",
    success: function (respuesta) {
        console.log(respuesta);
        console.log(respuesta.length);
        $("#columnas").html(``);
        for (var i = 0; i < respuesta.length; i++) {
            $("#lista-columnas").append(
                `<a href="#" class="list-group-item list-group-item-action">${respuesta[i].Name}</a>`
            );
        }
    },
    error: function (error) {
        console.log(error);
    }
});


//cargar los datos convertidos
$.ajax({
    url: "../../ajax/carga-conversion.php",
    dataType: "json",
    success: function (respuesta) {
        console.log(respuesta);
        console.log(respuesta.length);
        $("#columnas").html(``);
        for (var i = 0; i < respuesta.length; i++) {
            $("#lista-conversion").append(
                `<a href="#" class="list-group-item list-group-item-action">${respuesta[i]}</a>`
            );
        }
    },
    error: function (error) {
        console.log(error);
    }
});

