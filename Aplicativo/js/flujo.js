function flujo(button) {
    console.log("flujo: " + button.value);
    var parametros =
        "flujo=" + button.value;
    $.ajax({
        url: "ajax/flujo-oltp.php",
        method: "POST",
        data: parametros,
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta);
            window.location.href = "data flow/oldb origin/origin.php";
        },
        error: function (error) {
            console.log(error);
        }
    });
}