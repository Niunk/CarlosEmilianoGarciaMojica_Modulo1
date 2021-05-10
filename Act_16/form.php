<?php
    session_start();
    if(isset($_SESSION["sesion"]))
        header("location: ./index.php");
    else
    {
        echo "
        <form action='index.php' method='post'>
            <fieldset style='width:400px'>
                <legend>Inicio de sesión</legend>
                Nombre:<input type='text' name='datos[]' required><br><br>
                Apellidos:<input type='text' name='datos[]' required><br><br>
                Grupo:<input type='number' name='datos[]' value='grupo' required><br><br>
                Fecha de naciemiento:<input type='date' name='datos[]' required><br><br>
                Correo electrónico:<input type='email' name='datos[]' required><br><br>
                Contraseña:<input type='password' name='datos[]' value='contrasena' required><br><br>
                <input type='submit' value='Ingresar' name='inicio'>        
            </fieldset>
        </form>";
    }
?>