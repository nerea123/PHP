<?php

echo "<h1>Listado de directorio listar solo .php</h1><br> <h2>Usando strpos</h2><br>";

$directorio = opendir("./listar");
while ($archivo = readdir($directorio)) {

	if ($archivo != "." && $archivo != ".." && !valida($archivo)) 
	echo "$archivo <br>";

}

closedir($directorio);

function valida($archivo)
{	$error=TRUE;
	if (strpos($archivo, ".php"))  $error=FALSE;
	
	return $error;
}

echo "<h2>Usando glob</h2><br>";

$directorio = "./listar/";
 
$archivos = glob("" . $directorio . "*.php");
 
foreach($archivos as $archivo) {
  echo "$archivo<br>";
}

?>