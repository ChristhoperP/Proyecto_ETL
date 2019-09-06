//cargar las tablas
$.ajax({
    url: "../../ajax/carga-tablas.php",
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
        console.log(respuesta["total"]);
        $("#tabla-origen").html(``);
        for (var i = 0; i < respuesta.total; i++) {
            $("#tabla-origen").append(
                `<option value="${respuesta[i].nombre}">${respuesta[i].nombre}</option>`
            );
        }
    },
    error: function(error) {
        console.log(error);
    }
});


$("#seleccion-tabla").change(function (){
    $("#panel-tabla").removeClass("d-none");
    $("#panel-consulta").addClass("d-none");
});

$("#seleccion-consulta").change(function (){
    $("#panel-consulta").removeClass("d-none");
    $("#panel-tabla").addClass("d-none");
});

$("#tabla-origen").click(function () { 
    if($(this).val()!=''){
        $("#btn-org").removeAttr("disabled");
    }
    else{
        $("#btn-org").attr("disabled", "disabled");
    }
});

$("#consulta").change(function () { 
    if($(this).val()!=''){
        $("#btn-org").removeAttr("disabled");
    }
    else{
        $("#btn-org").attr("disabled", "disabled");
    }
});


//Enviar la informacion al servidor para validar y redirigir a la seleccion de los campos
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
                    var parametros = $("#formulario-origen").serialize();
                    console.log(parametros);
                    
                    $.ajax({
                        url: "../../ajax/origin.php",
                        method: "POST",
                        dataType: "json",
                        data: parametros,
                        success: function (respuesta) {

                            console.log(respuesta);

                            if(respuesta.resul=='1'){
                                console.log('Se debe hacer el salto');
                                window.location.href = "columnas.php";
                            }else{
                                alert('Error en la consulta.');
                            }
                            //window.location.href = "tablas.php";

                        },
                        error: function (error) {
                            console.log(error);
                            alert("error al registrar");
                            //limpiar();
                        }
                    });
                 
                }
                
            }, false);
        });
    }, false);
})();

$("#formulario-origen").submit(function () {
    return false;
});