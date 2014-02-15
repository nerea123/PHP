
<html>
	<head></head>
	<body>
<?php
    $nom=$_REQUEST['nom'];
	$ape=$_REQUEST['ape'];
	$estado=$_REQUEST['estado'];
	$idiomas=$_REQUEST['idiomas'];
	$cadena="";
	
	$boton=$_REQUEST['boton'];
	
	foreach ($idiomas as $idioma) {
		$cadena.=$idioma." ";
	}
	
	echo ("Sus datos son: ".$nom ." ".$ape." ".$estado." ".$cadena);
	if($boton)
		echo "Se ha pusado el boton";
?>
</body>
</html>