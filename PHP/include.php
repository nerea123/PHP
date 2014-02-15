<?php
include("config.php");
include("utils.php");
$radio = 5;
$circunferencia = 2 * $radio * PI;
$area = PI * cuadrado($radio);
echo "Un círculo de rádio $radio tiene circunferencia ";
echo "$circunferencia y área $area.<br>";
$area = -8;
if (es_positivo($area)) {
$radio = raiz($area / PI);
echo "Un círculo de área $area tiene un rádio $radio";
} else {
echo "No se puede calcular, área negativa.";
}
?>