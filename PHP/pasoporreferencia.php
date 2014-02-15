<?php
function duplicar_por_valor($argumento) {
$argumento = $argumento * 2;
echo "Dentro de la función vale $argumento.<br>";
}
function duplicar_por_referencia(&$argumento) {
$argumento = $argumento * 2;
echo "Dentro de la función vale $argumento.<br>";
}
$numero1 = 5;
echo "Antes de llamar a la función vale $numero1.<br>";
duplicar_por_valor($numero1);
echo "Después de llamar a la función vale $numero1.<br>";
echo "<br>";
$numero2 = 7;
echo "Antes de llamar a la función vale $numero2.<br>";
duplicar_por_referencia($numero2);
echo "Después de llamar a la función vale $numero2.<br>";
?>