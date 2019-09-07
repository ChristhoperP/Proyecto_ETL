<?php

session_start();
include '../class/class-conexion.php';

switch ($_POST["consulta-olap"]) {
    case 'option1':
    $db = $_SESSION["olap"];
    $conexion = new Conexion("localhost", $db);

    $consulta = $_POST["consulta"];

    if ($resultado = $conexion->ejecutarConsulta($consulta)) {
        //guarda la consulta
        $_SESSION["consulta-command"] = $consulta;
        //guarda las columnas
        $_SESSION["columnas-command"] = sqlsrv_field_metadata($resultado);
        echo '{"resul":"1"}';
    } else {
        echo '{"resul":"0"}';
    }
    break;
    default:
        echo '{"op":"no funciona"}';
        break;
}
