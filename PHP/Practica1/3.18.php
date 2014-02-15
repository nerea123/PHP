<?php

echo "<h1>Listado de directorio listar</h1>";

$directorio = opendir("./listar");
while ($archivo = readdir($directorio)) {

	if ($archivo != "." && $archivo != "..") 
	echo "$archivo <br>";

}
?>