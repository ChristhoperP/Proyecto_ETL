$.ajax({
    url: "../../ajax/carga-conversion.php",
    dataType: "json",
    success: function (respuesta) {
        console.log(respuesta);
        console.log(respuesta.length);
        for (var i = 0; i < respuesta.length; i++) {
            $("#lista-select").append(

                ` <option value="${respuesta[i]}">${respuesta[i]}</option>`
                
            );
        }
    },
    error: function (error) {
        console.log(error);
    }
});

