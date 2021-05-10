<?php
    //Caso de haber presionado botón de hora mundial 
    if(isset($_POST["consulta"]))
    {
        //Obtención de paises elegidos
        $paises[0] = "Ciudad de México";
        foreach ($_POST["paises"] as $key => $value)
        {
            array_push($paises, $value);
        }
        //Arreglo con horarios de países
        $hors_paises = ["America/Mexico_City"=>"Ciudad de México",
                        "America/New_York"=>"Nueva York","America/Sao_Paulo"=>"Sao Paulo", 
                        "Europe/Madrid"=>"Madrid","Europe/Paris"=>"Paris",
                        "Europe/Rome"=>"Roma","Europe/Athens"=>"Atenas",
                        "Asia/Hong_Kong"=>"Beijing","Asia/Tokyo"=>"Tokio"];
        date_default_timezone_set("America/Mexico_City");
        $hr_loc = $_POST["hora_local"];
        $hr_sep = explode(":", $hr_loc);
        $hr_verd = localtime(time());
        //Obtención de diferencia de horario en horas respecto al horario real
        $dif_hr = intval($hr_sep[0]) - $hr_verd[2];
        $min = $hr_sep[1];
        if ($dif_hr < 0)
            $dif_hr += $dif_hr*-2;
        //Tabla así como arreglo que imprime segun países elegidos y que cambia el horario al del respectivo país, se suma la diferencia de horas y en caso de rebasar 24 se resta 24 significando que es el siguiente día
        echo "
        <table border='1'>
            <thead>
                <tr>
                    <th colspan='2'><h1>Reloj Mundial</h1></th>
                </tr>
            </thead>
            <tbody>";
            foreach($paises as $key => $value)
            {
                foreach($hors_paises as $llave => $valor)
                {
                    if($value==$valor)
                        $pais = $llave;
                }
                date_default_timezone_set($pais);
                $hor_loc = localtime(time());
                $hor = $hor_loc[2] + $dif_hr;
                if($hor >= 24)
                    $hor -= 24;
                echo "
                <tr>
                    <td>$value</td>
                    <td>$hor hrs $min mins</td>
                </tr>
                ";
            }
            echo "</tbody>
        </table>";
    }
    //Caso de haber presionado cumpleaños
    else
    {
        $fecha = $_POST["cump"];
        if(isset($_POST["tiempos"]))
            $tiempos = $_POST["tiempos"];
        $form = explode("-", $fecha);
        $anio = date("Y");
        $sig = false;
        $an_fech = intval($anio).intval($form[1]).intval($form[2]);
        $an_act = intval($anio).intval(date("m")).intval(date("d"));
        $sig_an = intval($anio);
        $sig_an++;
        //En base a los segundos se revisa si es menor o mayor a la fecha actual, revisando si el siguiente cumpleaños es el mismo año actual o el siguiente
        if($an_act <= $an_fech)
            $form2 = $form[2]."-".$form[1]."-".$anio;
        else
        {
            $form2 = $form[2]."-".$form[1]."-".$sig_an;
            $sig = true;
        }
        echo "
        <table border='1'>
            <tr>
                <th>Cumpleaños:</th>
                <th>$form2</th>
            </tr>
        ";
        //De acuerdo a las opciones se realiza un cálculo de conversión de seg a minutos a horas y días (/60 /24) de la fecha dada y con localtime se revisa si es fin de semana
        if(isset($_POST["tiempos"]))
        {
            date_default_timezone_set("America/Mexico_City");
            $mes = intval($form[1]);
            $dia = intval($form[2]); 
            if($sig === false)
            {
                $fech_rec = mktime(0,0,0,$mes,$dia,$anio);
                $finde = localtime(mktime(0,0,0,$mes,$dia,$anio));
            }
            if($sig === true)
            {
                $fech_rec = mktime(0,0,0,$mes,$dia,$sig_an);
                $finde = localtime(mktime(0,0,0,$mes,$dia,$sig_an));
            }
            $fech_act = time();
            $seg = $fech_rec - $fech_act;
            $minus = $seg / 60;
            if($minus < 0)
                $minus += $minus*-2;
            $horas = $minus / 60;
            if($horas < 0)
                $horas += $horas*-2;
            $dias = $horas / 24;
            $horas = intval($horas);
            $minus = intval($minus);
            ($finde[6] == 6 || $finde[6] == 0)?$esfin="Sí lo es":$esfin="No lo es"; 
            if(intval($dias)>=1)
                $dias = intval($dias)+2;
            else 
            {
                if($dias > 0 && $dias < 0.5)
                {
                    $dias = 1;
                }
                else
                    $dias = 2;
            }
           $op = [$dias,$horas,$minus,$esfin];
              foreach ($tiempos as $key => $value)
              {
                if($value == "dias")
                    echo "<tr><td>Dias</td><td>$op[0]</td></tr>";
                if($value == "horas")
                    echo "<tr><td>Horas</td><td>$op[1]</td></tr>";
                if($value == "minutos")
                    echo "<tr><td>Minutos</td><td>$op[2]</td></tr>";
                if($value == "finde")
                    echo "<tr><td>¿Es fin de semana?</td><td>$op[3]</td></tr>";
              }
        }
        echo "</table>";
    }
?>