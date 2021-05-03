<?php
    $i=1;
    $letras = ['A','B','C','D'];
    $con=true;
    $caso_uno = true;
    $caso_doble = true;
    $opl = ['A' => 0, 'B' => 0,'C' => 0,'D' => 0];
    $resultado=["al pastor", "de suadero", "de barbacoa",
    "Lagunero", "campechano", "de carnitas",
    "bell", "light", "placero", 
    "de mixiote","de sal"];
    $num_arr = "preg".$i;
    //Obtiene lo enviado en $num_arr 
    while(isset($_POST["$num_arr"]))
    {
      $op_el[$i-1]=$_POST["$num_arr"];
      $i++;
      $num_arr="preg".$i;
    }
    //Ordena para cuando se hagan comparaciones, sea siempre en orden de letra primera alfabetica y después la siguiente (un solo caso)
    sort($op_el);
    //Ciclo para cambiar el valor al que estan asociados las llaves de A,B,C y D (conteo de veces elegidas)
    foreach($opl as $key => $value)
    {   
      foreach($op_el as $llave => $valor)
      {
        if($valor==$key)
        {
          $opl[$key]++;
        } 
      }
    }  
    $i = 0;
    $j=0;
    //Ciclo para determinar si solo fue un caso con más votos($caso_uno=true) o dos ($caso_doble=true), se guarda en $mayor para eñ primer caso y se concatenan en el segundo
    foreach($opl as $llave => $value)
    {
      $k=0;
      if($i!=3)
        $i=0;  
      foreach($opl as $llave2 => $value2)
      {    
        if($value > $value2)
        {
          $i++;
          if($i===3)
          {
             $mayor = $llave;
             $caso_uno = true;
             $caso_doble = false;
          }
        }
        elseif($j==3 && $k==3 && $i<3)
        {
          $caso_uno=false;
          foreach($opl as $llave3 => $value3)
          {
            foreach($opl as $llave4 => $value4)
            {
              if($value3==$value4 && $llave3 != $llave4 && $con==true)
              {
                $llav1 = $llave3;
                $llav2 = $llave4;
                $res2 = $llave3.$llave4;
                $caso_doble=true;
                $con = false; 
              }
            }
          }
        }
        $k++;
      }
      $j++; 
    }
    //Asignación según el caso de $res de un valor numérico (tipo de taco en arreglo $resultado)
    if($caso_uno==true)
    {
      for($i=0; $i<=3; $i++)
      {
        if($mayor == $letras[$i])
          $res = $i;
      }  
    }
    elseif($caso_doble==true)
    {
      switch($res2)
      {
        case 'AB':
          $res=4;
          break;
        case 'BC':
          $res=5;
          break;
        case 'CD':
          $res=6;
          break;
        case 'AD':
          $res=7;
          break;
        case 'AC':
          $res=8;
          break;
        case 'BD':
          $res=9;
          break;
        default:
          $res=10;
          break;
      }
    }
    echo '<h1>Eres un taco '.$resultado[$res].'</h1>';
?>
