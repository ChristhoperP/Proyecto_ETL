<?php
/* session_start();
    include '../class/class-conexion.php';
    $db=$_SESSION["oltp"];
    $conexion=new Conexion("localhost",$db);

    $resultado=$conexion->ejecutarConsulta('select t.name
    from sys.tables t');


    $formato="{";

    $tope=sqlsrv_num_rows($resultado);
    $i=0;

    while($fila=sqlsrv_fetch_array($resultado)){

        $formato.='"'.$i.'":{"nombre":"'.$fila[0].'"},'; 
        $i++;

    }

    $formato.='"total":"'.$tope.'"}'; */
session_start();
include '../class/class-conexion.php';

switch ($_POST["optradio"]) {
    case 'option1':
        $db = $_SESSION["oltp"]; 
        $conexion = new Conexion("localhost",  $db);

        $consulta = "SELECT * FROM " . $_POST["tabla-origen"];

        if ($resultado = $conexion->ejecutarConsulta($consulta)) {
            //guarda la consulta
            $_SESSION["consulta-origen"] = $consulta;
            //guarda las columnas
            $_SESSION["columnas-origen"] = sqlsrv_field_metadata($resultado);
            echo '{"resul":"1"}';
        } else {
            echo '{"resul":"0"}';
        }

        break;
    case 'option2':
        $db = $_SESSION["oltp"];
        $conexion = new Conexion("localhost", $db);

        $consulta = $_POST["consulta"];//En teoria solo cambia la consulta

        if ($resultado = $conexion->ejecutarConsulta($consulta)) {
            //guarda la consulta
            $_SESSION["consulta-origen"] = $consulta;
            //guarda las columnas
            $_SESSION["columnas-origen"] = sqlsrv_field_metadata($resultado);
            echo '{"resul":"1"}';
        } else {
            echo '{"resul":"0"}';
        }
        break;
    default:
        echo '{"op":"no funciona"}';
        break;
}
