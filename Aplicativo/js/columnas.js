//cargar las columnas
$.ajax({
    url: "../../ajax/carga-columnas.php",
    dataType: "json",
    success: function (respuesta) {
        console.log(respuesta);
        console.log(respuesta.length);
        $("#columnas").html(``);
        for (var i = 0; i < respuesta.length; i++) {
            $("#columnas").append(
                `<div class="form-check">
                    <label class="form-check-label" for="check1">
                        <input type="checkbox" class="form-check-input" id="col-${i}" name="${i}" value="${respuesta[i].Name}"
                            checked>${respuesta[i].Name}
                    </label>
                </div>`
            );
        }
    },
    error: function (error) {
        console.log(error);
    }
});

$("#btn-col").click(function () {
    var parametros = $("#formulario-columnas").serialize();
    console.log(parametros);

    //se enviará a un archivo donde se almacenaran las columnas y luego lo redireccionara al data comand
    $.ajax({
        url: "../../ajax/guarda-columnas.php",
        method: "POST",
        dataType: "json",
        data: parametros,
        success: function (respuesta) {
            console.log(respuesta);
            window.location.href = "../Data Conversion/conversion.php";
        },
        error: function (error) {
            console.log(error);
            alert("error al guardar columnas.");
            //limpiar();
        }
    });
});