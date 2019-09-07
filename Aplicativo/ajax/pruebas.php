<?php
include '../class/class-conexion.php';

$tipo_dato_numerico=array(-9=>"nvarchar",1=>"Char",93=>"datetime", 4=>"int", 6=>"float", 3=>"Money", -2=>"timestamp", 10=>"date");


$db = "aerolinea";

$conexion = new Conexion("localhost", $db);

$consulta = "SELECT * FROM (select * from boleto) tb1";

$resultado = $conexion->ejecutarConsulta($consulta);

//echo $resultado;

echo(sqlsrv_num_fields($resultado));

echo '<br>';

//print_r(sqlsrv_field_metadata($resultado)[0]["Name"]);

for ($i=0; $i <sqlsrv_num_fields($resultado) ; $i++) { 
    print_r(sqlsrv_field_metadata($resultado)[$i]["Name"]);
    echo " ";
    echo $tipo_dato_numerico[sqlsrv_field_metadata($resultado)[$i]["Type"]];
    echo '<br>';
}

echo json_encode(sqlsrv_field_metadata($resultado));

echo '<br>';

echo '<br>';

