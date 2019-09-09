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

    
$.ajax({
    url: "../../ajax/carga-conversion2.php",
    method: "POST",
    dataType: "json",
    success: function (respuesta1) {
        console.log("Conversion: ");
        console.log(respuesta1);
        $.ajax({
            url: "../../ajax/carga-conversion.php",
            method: "POST",
            dataType: "json",
            success: function (respuesta2) {
                console.log("Original: ");
                console.log(respuesta2);
                
                for (var i = 0; i < respuesta1.length; i++) {
                    for (var i = 0; i < respuesta2.length; i++) {
                    $("#lista-conversion").append(
        
                        ` <div class="col-2">
                        <select class="form-control" id="lista-select" name="${respuesta1[i].Name}">
                        <option value="${respuesta2[i]}">${respuesta2[i]}</option>
                       `
                        
                    );
                }}
            },
            error: function (error) {
                console.log(error);
                alert("error al convertir json.");
                //limpiar();
            }
        });
    },
    
    error: function (error) {
        console.log(error);
        alert("error al convertir json.");
        //limpiar();
    }
});

//cargar los datos convertidos
/* $.ajax({
    url: "../../ajax/carga-conversion2.php",
    dataType: "json",
    success: function (respuesta) {
        console.log(respuesta);
        console.log(respuesta.length);
        for (var i = 0; i < respuesta.length; i++) {
            $("#lista-conversion").append(

                ` <div class="col-2">
                <select class="form-control" id="lista-select" name="${respuesta[i].Name}">
               `
                
            );
        }
    },
    error: function (error) {
        console.log(error);
    }
});
 */

//Funcion del boton para hacer consulta
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
                    var parametros = $("#formulario-proceso").serialize();
                    alert(parametros);
                    
                     $.ajax({
                        url: "../../ajax/proceso-destino.php",
                        method: "POST",
                        dataType: "json",
                        data: parametros,
                        success: function (respuesta) {

                            console.log(respuesta);
                           window.location.href = "../../tablas.php"; 
                          /*   window.location.href = "data flow/destination/destino.php"; */
 
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

$("#formulario-proceso").submit(function () {
    return false;
});