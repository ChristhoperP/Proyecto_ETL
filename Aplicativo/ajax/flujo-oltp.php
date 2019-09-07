<?php

        
        session_start();
       
        $_SESSION["flujo-oltp"]=$_POST["flujo"];

      

     
echo '{"flujo-tabla":"'.$_SESSION["flujo-oltp"].'"}';


    
?>