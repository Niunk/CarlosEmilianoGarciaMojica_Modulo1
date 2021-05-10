<?php
    //Validaciones y tabla
    session_start();
    if(isset($_POST["inicio"]))
    {
        $_SESSION["sesion"] = $_POST["datos"];
        header("location: ./index.php");
    }
    if(isset($_SESSION["sesion"]))
    {
        echo "<table border=1>";
        $datos = ["Nombre completo:", "Grupo:", "Fecha de nacimiento:", "Correo electrónico:"];  
       $datos2 = $_SESSION["sesion"];
       //Concatena nombre/apellidos, tabla
       $datos2[0] = $datos2[0]." ".$datos2[1];
       for($i=1;$i<=count($datos2);$i++)
       {
           if(isset($datos2[$i+1]))
            $datos2[$i] = $datos2[$i+1];
       }
       array_pop($datos2);
       $i = 0;
        foreach($datos2 as $key => $value)
        {
            if($value != "contrasena")
                echo "<tr><td>$datos[$i]</td><td>$value</td></tr>";
            $i++;
        }
        echo "</table><br>";
        echo "<form action='./cerrar.php' method='post'>
            <input type='submit' value='Cerrar sesión' name='cerrar'></form>";
    }
    else
    {
        header("location: ./form.php");
    }
?>