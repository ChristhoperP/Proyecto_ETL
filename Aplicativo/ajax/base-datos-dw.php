<?php

        
        session_start();
        $_SESSION["oltp"]=$_POST["oltp"];
        $_SESSION["olap"]=$_POST["olap"];
      

     
echo '{"Olap":"'.$_SESSION["olap"].'"}';


    
?>