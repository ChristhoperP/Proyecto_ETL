<?php
/* switch ($_GET["opcion"]) {
 
    case 1:
        */
        
        session_start();
        $_SESSION['nombrebase']=$_POST["olap"];
      

        $base=$_SESSION['nombrebase']; 
        
  
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

    //var_dump($registro);

    echo $formato;
      /*   break;
    
    case 2:
        break;
    
    case 3:
    break; */

?>