<?php
$precio_kg = 1.29;
$peso = 2.17;
$a_pagar = $precio_kg * $peso;
// Saca el dato $a_pagar ocn 2 decimales
echo "A pagar " . number_format($a_pagar, 2) . " euros.";
?>