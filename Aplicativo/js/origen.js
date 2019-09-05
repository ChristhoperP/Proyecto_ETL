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