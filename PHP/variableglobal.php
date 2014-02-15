<?php
function mi_ciudad() {
global $ciudad;
$ciudad = "Madrid";
echo "Dentro de la función vale $ciudad.<br>";
}
$ciudad = "Barcelona";
echo "Antes de llamar a la función vale $ciudad.<br>";
mi_ciudad();
echo "Después de llamar a la función vale $ciudad.<br>"
?>