<?php    
        session_start();
 
include '../class/class-conexion.php';
$db = $_SESSION["olap"];
$conexion = new Conexion("localhost", $db);

$consulta = "SELECT * FROM " . $_POST["flujo"];

if ($resultado = $conexion->ejecutarConsulta($consulta)) {
    //guarda las columnas
    $_SESSION["columnas-destino"] = sqlsrv_field_metadata($resultado);
    echo '{"resul":"1"}';
} else {
    echo '{"resul":"0"}';
}

?>
