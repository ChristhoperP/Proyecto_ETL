<?php


session_start();

$_SESSION["flujo-olap"] = $_POST["flujo"];

echo '{"flujo-tabla":"' . $_SESSION["flujo-olap"] . '"}';
