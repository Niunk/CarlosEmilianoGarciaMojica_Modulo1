<?php

//Variable de columnas
$col = 10;
//Variable de filas
$fil = $col;
//Variable que en función de la fila, determina el color del primer cuadrado
$var_fil;

echo "<table border='1'>";
//Iteración que da las filas
while ($fil>0)
{
  //Condición ternaria donde según la fila par o impar toma el valor de 1 o 0
  $var_fil=($fil%2===0)?0:1;
  echo "<tr>";
  //Ciclo para las columnas
  for($i=1;$i<=$col;$i++)
  {
    //En función de la columna, hace comparación con el valor de var_fil(fila par o impar) y empieza por blanco o negro
    if($i%2===$var_fil)
    {
      echo "<td><img src='./negro.jpg' width='100' height='100'></td>";
    }
    else
    {
      echo "<td><img src='./blanco.jpg' width='100' height='100'></td>";
    }
  }
  echo "</tr>";
  $fil--;
}
echo "</table>";
?>
