<?php

$num_ini = 0;

$divisor = 13; // divisor

$num_fin = 100;

echo "<h3>N�meros divisibles per $divisor (fins a $num_fin)</h3>";

for($i = $num_ini; $i < $num_fin; $i++)

// si �s divisible entre $divisor, l'escriurem

if ($i % $divisor == 0 )

echo "$i - ";

?>