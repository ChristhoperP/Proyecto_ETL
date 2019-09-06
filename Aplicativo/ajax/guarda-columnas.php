<?php

session_start();

$columnas = array();
$i=0;
foreach ($_POST as $clave => $valor) {
    $columnas[$i]=$valor;
    $i++;
}

$_SESSION["columnas-origen-selec"]=$columnas;
echo json_encode($columnas);
