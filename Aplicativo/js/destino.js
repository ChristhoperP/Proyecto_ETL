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






(function () {
    'use strict';

    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');

        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                    form.classList.add('was-validated');
                    console.log("tamos mal :c");
                } else {
                    console.log("tamos bien");
                    var parametros = $("#formulario-destino").serialize();
                    //alert(parametros);
                    
                    $.ajax({
                        url: "ajax/info-destino2.php",
                        method: "POST",
                        dataType: "json",
                        data: parametros,
                        success: function (respuesta) {

                            console.log(respuesta);
                            window.location.href = "columnas-destino.php";

                        },
                        error: function (error) {
                            console.log(error);
                            alert("error al registrar");
                            limpiar();
                        }
                    });
                 
                }
                
            }, false);
        });
    }, false);
})();

$("#formulario-destino").submit(function () {
    return false;
}); 