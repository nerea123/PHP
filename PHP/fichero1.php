<html>
	<head></head>
	<body>
		<?php
    		$ruta="utils.php";
			$archivo=fopen($ruta,"w+");
			if($archivo){
				print "Archivo $ruta abierto para escritura y lectura";
			}
			else {
				print "No se pudo abrir";
			}
		?>

	</body>
</html>
explode[separador,$linea]
