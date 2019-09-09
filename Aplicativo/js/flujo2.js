function flujo(button) {
    console.log("flujo: " + button.value);
    var parametros =
        "flujo=" + button.value;
    $.ajax({
        url: "../../ajax/proceso.php",
        method: "POST",
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
            alert(respuesta);
            console.log(respuesta);
             window.location.href = "proceso.php";
        },
        error: function (error) {
            console.log(error);
        }
    });
}