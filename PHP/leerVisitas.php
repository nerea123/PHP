<html>
<head>
	<title>Pr&aacute;ctica 3_2.</title>
	<style type="text/css">
		th{background-color:#9999FF;color:#FFFFFF};
		td{color:#0000CC};
		.titulo{color:gray;background-color:#9999FF;font-family:Arial, Helvetica, sans-serif;font-size:20pt;font-weight:700}
	</style>
</head>
<body>
<table border=0 align=center cellspacing="5">
<tr><td class="titulo" align="center">
	LIBRO DE VISITAS
</td></tr>
<tr><td>
<?php
	include ('visitaConf.php');
    $archivo=fopen("visitas.txt", "r");
	while (!feof($archivo))
			{
				$linea=fgets($archivo); //Lee l�nea de fichero correspondiente a un registro del libro
				if ($linea<>"")   //evito hacer una tabla para la �ltima l�nea (vac�a) del fichero
				{
					$datos=explode(SEPARADOR,$linea); //Separa el registro en sus campos
					echo "<table  border=\"1\"";
					echo "bgcolor=\"gray\" cellpadding=\"5\" cellspaccing=\"3\">";
					echo "<tr><th>NOMBRE</th><td>$datos[0]</td>";
					echo "<tr><th>EDAD</th><td>$datos[1] a&ntilde;os</td>";
					echo "<tr><th>COMENTARIO</th><td>$datos[2]</td>";
					echo "</table><br>";
				}
			}
			fclose($archivo);
	
?>
</td></tr>
</table>
<br>
<p align="right">
	<a href="./nueva_visita.php">Introducir visita</a>
</p>
</body>
</html>