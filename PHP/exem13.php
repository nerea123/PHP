<?php

$num_ini = 0;

$divisor = 13; // divisor

$num_fin = 100;

echo "<h3>N�meros divisibles per $div (fins a $total)</h3>";

$i = $num_ini;

while ($i <= $num_fin){

// si �s divisible entre $div, l'escriurem

if ($i % $divisor == 0 )

$i++;

}

?>