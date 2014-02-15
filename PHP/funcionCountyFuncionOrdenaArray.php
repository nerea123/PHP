<?php
$frutas = array("melón", "sandía", "naranja");
echo "La lista contiene " . count($frutas) . " frutas.";
?>
<?php
$astros = array("planeta", "cometa", "Venus", "Jupiter");
echo "Ordenación distinguiendo mayúsculas y minúsculas:<br>";
sort($astros);
for ($i = 0; $i < count($astros); $i++) {
echo "$astros[$i]<br>";
}
echo "<br>";
echo "Ordenación sin distinguir mayúsculas y minúsculas:<br>";
$astros_minusculas = array_map("strtolower", $astros);
array_multisort($astros_minusculas, SORT_ASC, SORT_STRING, $astros);
for ($i = 0; $i < count($astros); $i++) {
echo "$astros[$i]<br>";
}
?>