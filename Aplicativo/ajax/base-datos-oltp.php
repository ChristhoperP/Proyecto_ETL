<?php

        

session_start();
$base=$_SESSION["oltp"]; 
 

//se establece una conexion a la base de datos

include '../class/class-conexion.php';
$conexion=new Conexion("localhost",$base);

$resultado=$conexion->ejecutarConsulta('select t.name
from sys.tables t');


$formato="{";

$tope=sqlsrv_num_rows($resultado);
$i=0;

while($fila=sqlsrv_fetch_array($resultado)){

 $formato.='"'.$i.'":{"nombre":"'.$fila[0].'"},'; 
 $i++;

}

$formato.='"total":"'.$tope.'"}';

echo $formato;
    
?>