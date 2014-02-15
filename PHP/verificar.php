<?php
echo "Comprueba si tus datos son correctos.<br>";
echo "<br>";
echo "{$_REQUEST["nombre"]}.<br>";
echo "Nivel de internet: {$_REQUEST["nivel"]}.<br>";
if (($_REQUEST["basic"] == "on")
|| ($_REQUEST["c_cplus"] == "on")
|| ($_REQUEST["java"] == "on")) {
echo "Con experiencia en ";
if ($_REQUEST["basic"] == "on") {
echo "Visual Basic";
if ($_REQUEST["c_cplus"] == "on") {
echo ", C/C++";
}
if ($_REQUEST["java"] == "on") {
echo ", Java";
}
} else if ($_REQUEST["c_cplus"] == "on") {
echo "C/C++";
if ($_REQUEST["java"] == "on") {
echo ", Java";
}
} else {
if ($_REQUEST["java"] == "on") {
echo "Java";
}
}
echo ".<br>";
} else {
echo "Sin experiencia previa en programación.<br>";
}
echo "<br>";
echo "OPINIÓN SOBRE EL CURSO:<br>";
echo nl2br($_REQUEST["opinion"]); //convierte saltos de línea en <br>
?>