<?php
    session_start();
    include '../class/class-conexion.php';
    $db=$_SESSION["oltp"];
    $conexion=new Conexion("localhost", $db);

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

    //var_dump($registro);

    echo $formato;
?>