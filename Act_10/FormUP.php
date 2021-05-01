<?php
    $nom=(isset($_POST["Nombre"]) && $_POST["Nombre"]!="")?$_POST["Nombre"]:"No especificó";
    $appat=(isset($_POST["ApPat"]) && $_POST["ApPat"]!="")?$_POST["ApPat"]:"No especificó";
    $apmat=(isset($_POST["ApMat"]) && $_POST["ApMat"]!="")?$_POST["ApMat"]:"No especificó";
    $edad=(isset($_POST["Edad"]) && $_POST["Edad"]!="")?$_POST["Edad"]:"No especificó";
    $gen=(isset($_POST["genero"]) && $_POST["genero"]!="")?$_POST["genero"]:"No especificó";
    $cor=(isset($_POST["Correo"]) && $_POST["Correo"]!="")?$_POST["Correo"]:"No especificó";
    $tel=(isset($_POST["Tel"]) && $_POST["Tel"]!="")?$_POST["Tel"]:"No especificó";
    $cel=(isset($_POST["Cel"]) && $_POST["Cel"]!="")?$_POST["Cel"]:"No especificó";
    $esc=(isset($_POST["EscPr"]) && $_POST["EscPr"]!="")?$_POST["EscPr"]:"No especificó";
    $prom=(isset($_POST["Promedio"]) && $_POST["Promedio"]!="")?$_POST["Promedio"]:"No especificó";
    $op1=(isset($_POST["Op1"]) && $_POST["Op1"]!="")?$_POST["Op1"]:"No especificó";
    $op2=(isset($_POST["Op2"]) && $_POST["Op2"]!="")?$_POST["Op2"]:"No especificó";

    echo "
    <table border='1'>
        <thead>
            <tr>
                <th colspan='4'><h1>Solicitud de ingreso a la universidad</h1>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>$appat</td>
                <td>$apmat</td>
                <td colspan='2'>$nom</td>
            </tr>
            <tr>
                <td><strong><u>Apellido paterno</u></strong></td>
                <td><strong><u>Apellido materno</u></strong></td>
                <td colspan='2'><strong><u>Nombre(s)</u></strong></td>
            </tr>
            <tr>
                <td><strong><u>Sexo:</u></strong></td>
                <td>$gen</td>
                <td><strong><u>Edad:</u></strong></td>
                <td>$edad</td>
            </tr>
            <tr>
                <td colspan='2'>$cor</td>
                <td>$tel</td>
                <td>$cel</td>
            </tr>
            <tr>
                <td colspan='2'><strong><u>Correo electrónico</u></strong></td>
                <td><strong><u>Teléfono</u></strong></td>
                <td><strong><u>Celular</u></strong></td>
            </tr>
            <tr>
                <td><strong><u>Escuela de procedencia:</u></strong></td>
                <td>$esc</td>
                <td><strong><u>Promedio:</u></strong>
                <td>$prom</td>
            </tr>
            <tr>
                <td colspan='2'><strong><u>Primera opción</u></strong></td>
                <td colspan='2'>$op1</td>
            </tr>
            <td colspan='2'><strong><u>Segunda opción</u></strong></td>
            <td colspan='2'>$op2</td>
        </tr>
        </tbody>
    </table>
    ";
?>