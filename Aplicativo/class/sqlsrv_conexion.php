<?php

$serverName = "localhost"; //serverName\instanceName
$connectionInfo = array( "Database"=>"Northwind");

$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br/>";

     $sql="SELECT LastName,FirstName FROM Employees";
     $params = array();
     $options =  array( "Scrollable" => SQLSRV_CURSOR_STATIC );
     
     $stmt = sqlsrv_query( $conn, $sql , $params, $options );

     echo (sqlsrv_num_rows($stmt));
     echo '<br>';

     while($prueba=sqlsrv_fetch_array($stmt)){
          echo $prueba[0];
          echo '<br>';
     };
     
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>