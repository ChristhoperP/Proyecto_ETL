//cargar los campos
var arregloCampos=Array();
var numero_campos=0;
$.ajax({
    url: "../../ajax/conversion.php?opcion=1",
    method:"GET",
    dataType: "json",
    success: function (respuesta) {
        console.log(respuesta);
        console.log(respuesta.length);
        numero_campos=respuesta.length;
        $("#tabla-1").html(``);
        $("#listado-campos").html(``);
        for (var i = 0; i < respuesta.length; i++) {
            if(respuesta[i].Type=="datetime"||respuesta[i].Type=="date"||respuesta[i].Type=="timestamp"){
                $("#tabla-1").append(
                    `<div class="row mb-1">                       
                        <div class="form-check col-2">
                            <label class="form-check-label" for="check1">
                                <input type="checkbox" class="form-check-input" id="check-${respuesta[i].Name}" name="ca-${respuesta[i].Name}" value="" checked>
                                ${respuesta[i].Name}
                            </label>
                        </div>
                        <div class="col-1">
                            <label for="">${respuesta[i].Type}</label>
                        </div>
                        <div class="col-2">
                            <select class="form-control" id="${respuesta[i].Name}" name="${respuesta[i].Name}">
                                <option value="DATEPART(YEAR,${respuesta[i].Name})  ${respuesta[i].Name}_year">Año</option>
                                <option value="DATEPART(MONTH,${respuesta[i].Name}) ${respuesta[i].Name}_month">Mes</option>
                                <option value="DATEPART(DAY,${respuesta[i].Name})" ${respuesta[i].Name}_day>Día</option>
                                <option value="DATEPART(HOUR,${respuesta[i].Name}) ${respuesta[i].Name}_hour">Hora</option>
                            </select>
                        </div>
                    </div>`
                );
            }else{
                $("#tabla-1").append(
                    `<div class="row mb-1">
                        <div class="form-check col-2">
                            <label class="form-check-label" for="check1">
                                <input type="checkbox" class="form-check-input" id="check-${respuesta[i].Name}" name="ca-${respuesta[i].Name}" value="" checked>
                                ${respuesta[i].Name}
                            </label>
                        </div>
                        <div class="col-1">
                            <label for="">${respuesta[i].Type}</label>
                        </div>
                        <div class="col-2">
                            <select class="form-control" id="${respuesta[i].Name}" name="${respuesta[i].Name}">
                                <option value="${respuesta[i].Name}">Mantener</option>
                                <option value="UPPER(${respuesta[i].Name}) ${respuesta[i].Name}">Mayúscula</option>
                                <option value="LOWER(${respuesta[i].Name}) ${respuesta[i].Name}">Minúscula</option>
                            </select>
                        </div>
                    </div>`
                );
                $("#listado-campos").append(
                    `<div class="row">
                        <div class="col-2">
                            <div class="form-check">
                                <label class="form-check-label" for="check1">
                                    <input type="checkbox" class="form-check-input campos-c" id="${i}" name="${i}" value="${respuesta[i].Name}">
                                    ${respuesta[i].Name}
                                </label>
                            </div>
                        </div>
                    </div>`
                );
            }
            arregloCampos.push(respuesta[i].Name);
        }
        console.log(JSON.stringify(arregloCampos));
    },
    error: function (error) {
        console.log(error);
    }
});

//funcion boton "Agregar"
var concatid=0;
var nombres=Array();
$("#btn-agregar").click(function () {
    var parametros = $("#formulario-concatenas").serialize();
    if($("#nombre-concat").val()!=''&&parametros!=''&&!nombres.includes($("#nombre-concat").val())&&!arregloCampos.includes($("#nombre-concat").val())){
        console.log(parametros);

        $.ajax({
            url: "../../ajax/conversion.php?opcion=2",
            method: "POST",
            dataType: "json",
            data: parametros,
            success: function (respuesta) {
                concatid++;
                console.log(respuesta);
                var cadena='';
                for (var i = 0; i < numero_campos; i++) {
                    if(i<numero_campos-1){
                        if(respuesta[i]){
                            cadena+=respuesta[i]+",' ',";
                        }
                    }else{
                        if(respuesta[i]){
                            cadena+=respuesta[i];
                        }
                    }
                }
                $("#campo-concatenado").append(
                    `<div class="row">
                        <div class="col-4">
                            <div class="form-check">
                                <label class="form-check-label" for="check1">
                                    <input type="checkbox" class="form-check-input" id="check-${concatid}" name="c-${concatid}" value="" checked>
                                    ${$("#nombre-concat").val()}
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <select class="form-control" id="c-c${concatid}" name="c-c${concatid}">
                                <option value="CONCAT(${cadena}) ${$("#nombre-concat").val()}">Mantener</option>
                                <option value="UPPER(CONCAT(${cadena})) ${$("#nombre-concat").val()}">Mayúscula</option>
                                <option value="LOWER(CONCAT(${cadena})) ${$("#nombre-concat").val()}">Minúscula</option>
                            </select>
                        </div>
                    </div>`
                );
                nombres.push($("#nombre-concat").val());
                limpiar();
            },
            error: function (error) {
                console.log(error);
                alert("error al convertir json.");
                //limpiar();
            }
        });
    }else{
        alert("Debe establecer un nombre diferente y seleccionar los campos que desea concatenar.");
    }
});

function limpiar() {
    $(".campos-c").prop("checked", false);
    $("#nombre-concat").val("");
}

function generaUrl() {
    var arreglo_enviar=Array();
    for (let i = 0; i < numero_campos; i++) {
        if($("#check-"+arregloCampos[i]).prop("checked")){
            arreglo_enviar.push($("#"+arregloCampos[i]).val());
        }
    }
    for (let i = 0; i < nombres.length; i++) {
        if($("#check-"+(i+1)).prop("checked")){
            arreglo_enviar.push($("#c-c"+(i+1)).val());
        }
    }

    return arreglo_enviar;
}

function camposConversion() {
    var arreglo_enviar=Array();
    for (let i = 0; i < numero_campos; i++) {
        if($("#check-"+arregloCampos[i]).prop("checked")){
            arreglo_enviar.push(arregloCampos[i]);
        }
    }
    for (let i = 0; i < nombres.length; i++) {
        if($("#check-"+(i+1)).prop("checked")){
            arreglo_enviar.push(nombres[i]);
        }
    }

    return arreglo_enviar;
}

$("#btn-concat").click(function() {
    //console.log(generaUrl());//nombre campos conversion
    //console.log(camposConversion());//campos conversion
    
    $.ajax({
        url: "../../ajax/conversion.php?opcion=3",
        method: "POST",
        dataType: "json",
        data: {'array': JSON.stringify(generaUrl())},
        success: function (respuesta) {
            console.log("Conversion: ");
            console.log(respuesta);
            $.ajax({
                url: "../../ajax/conversion.php?opcion=4",
                method: "POST",
                dataType: "json",
                data: {'array': JSON.stringify(camposConversion())},
                success: function (respuesta) {
                    console.log("Original: ");
                    console.log(respuesta);
                    window.location.href = "../destination/destino.php";
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
});