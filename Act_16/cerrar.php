<?php
    //Cierra sesión
    session_start();
    if(isset($_POST["cerrar"]))
    {
        session_unset();
        session_destroy();
    }
    header("location: ./form.php");
?>