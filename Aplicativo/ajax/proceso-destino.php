<?php


session_start();

/* $_SESSION["flujo-olap"]=$ConsultaFinal */
echo json_encode($_POST);
/*    echo '{"tabla-destino":"' .$_SESSION["flujo-olap"] . '"}'; */

/* echo '{"proceso-destino":"' . json_encode($_SESSION["Conversion-Columnas"]) . '"}'; */



/* 
    include '../class/class-conexion.php';
    $db=$_SESSION["olap"];
    $conexion=new Conexion("localhost", $db);
    $columnas=json_encode($_SESSION["Conversion-Columnas"])
    $consulta = "SELECT $columnas FROM" .$_SESSION["flujo-olap"];
    $resultado=$conexion->ejecutarConsulta($consulta);
 */

    

    //var_dump($registro);

  /*   print_r($resultado); */
?>