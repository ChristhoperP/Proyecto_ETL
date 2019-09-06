//cargar las columnas
$.ajax({
    url: "../../ajax/carga-columnas.php",
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
        console.log(respuesta.length);
        $("#columnas").html(``);
        for (var i = 0; i < respuesta.length; i++) {
            $("#columnas").append(
                `<div class="form-check">
                    <label class="form-check-label" for="check1">
                        <input type="checkbox" class="form-check-input" id="col-${i}" name="option-${i}" value="${respuesta[i].Name}"
                            checked>${respuesta[i].Name}
                    </label>
                </div>`
            );
        }
    },
    error: function(error) {
        console.log(error);
    }
});