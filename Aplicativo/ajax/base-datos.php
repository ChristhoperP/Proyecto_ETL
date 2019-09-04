<?php
    include '../class/class-conexion.php';
    
    $conexion=new Conexion("localhost","master");

    $resultado=$conexion->ejecutarConsulta('SELECT * FROM sysdatabases where sid<>0x01');


    $formato="{";

    $tope=sqlsrv_num_rows($resultado);
    $i=0;

    while($fila=sqlsrv_fetch_array($resultado)){

        $formato.='"'.$i.'":{"nombre":"'.$fila[0].'"},'; 
        $i++;

    }

    $formato.='"total":"'.$tope.'"}';

    //var_dump($registro);

    echo $formato;
?>