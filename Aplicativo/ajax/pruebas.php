<?php
include '../class/class-conexion.php';


$db = "Northwind";

$conexion = new Conexion("localhost", $db);

$consulta = "SELECT * FROM (select firstname, lastname from Employees) tb1";

$resultado = $conexion->ejecutarConsulta($consulta);

//echo $resultado;

echo(sqlsrv_num_fields($resultado));

echo '<br>';

//print_r(sqlsrv_field_metadata($resultado)[0]["Name"]);

for ($i=0; $i <sqlsrv_num_fields($resultado) ; $i++) { 
    print_r(sqlsrv_field_metadata($resultado)[$i]["Name"]);
    echo '<br>';
}

echo json_encode(sqlsrv_field_metadata($resultado));
