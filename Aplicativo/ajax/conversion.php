<?php

switch ($_GET["opcion"]) {
        //Cargar las columnas
    case '1':
        session_start();
        $arreglo = array();
        $tipo_dato_numerico = array(-9 => "nvarchar", 1 => "Char", 93 => "datetime", 4 => "int", 6 => "float", 3 => "Money", -2 => "timestamp", 10 => "date");


        for ($i = 0; $i < sizeof($_SESSION["columnas-origen-selec"]); $i++) {

            for ($j = 0; $j < sizeof($_SESSION["columnas-origen"]); $j++) {
                if ($_SESSION["columnas-origen-selec"][$i] == $_SESSION["columnas-origen"][$j]["Name"]) {
                    $arreglo[$i]["Name"] = $_SESSION["columnas-origen-selec"][$i];
                    $arreglo[$i]["Type"] = $tipo_dato_numerico[$_SESSION["columnas-origen"][$j]["Type"]];
                }
            }
        }

        echo json_encode($arreglo);
        break;
        //convierte el url encode a json
    case '2':
            echo json_encode($_POST);
        break;
    default:
        # code...
        break;
}
