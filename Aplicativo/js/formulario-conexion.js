//Cargar las bases de datos
$.ajax({
    url: "ajax/base-datos.php",
    dataType: "json",
    success: function(respuesta) {
        console.log(respuesta);
        console.log(respuesta["total"]);
        for (var i = 0; i < respuesta.total; i++) {
            $("#oltp").append(
                `<option value="${respuesta[i].nombre}">${respuesta[i].nombre}</option>`
            );
            $("#olap").append(
                `<option value="${respuesta[i].nombre}">${respuesta[i].nombre}</option>`
            );
        }
    },
    error: function(error) {
        console.log(error);
    }
});

/* 
$("#olap").change(function(){
    alert ($("#olap").val());
}); 
 */

/* function seleccionar_base() {
    var tpm=$("#olap").val();
    alert(tpm);
    window.location.href = "tablas.php"
} */

/* $("#olap").change(function(){
    console.log("Cuenta seleccionado: " + $("#olap").val());
    var parametros= 
            "olap="+$("#olap").val();
    $.ajax({
        url:"ajax/base-datos-dw.php",
        method:"POST",
        data:parametros,
        dataType:"json",
        success: function(respuesta){
            console.log(respuesta);
         
        
        },
        error:function(error){
            console.log(error);
        }
     });

}); */


// Example starter JavaScript for disabling form submissions if there are invalid fields
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
                    var parametros = $("#formulario-base").serialize();
                    alert(parametros);
                    
                    $.ajax({
                        url: "ajax/base-datos-dw.php",
                        method: "POST",
                        dataType: "json",
                        data: parametros,
                        success: function (respuesta) {

                            console.log(respuesta);
                            window.location.href = "tablas.php";

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

$("#formulario-base").submit(function () {
    return false;
});