
<html>
	<head></head>
	<body>
<?php
$temporal = $_FILES["miarchivo"]["tmp_name"];
$destino = "descargas/" . $_FILES["miarchivo"]["name"];
if (move_uploaded_file($temporal, $destino)) {
	echo "<h1>Archivo subido con &eacute;xito </h1>";
} else {
	echo "<h1>Ocurrió un error, no se ha podido subir el archivo</h1>";
}
?>
	<table> 
			<tr>
				<td><a href="subir.php"><h3>Subir archivo</h3></a></td>
				<td><a href="listar.php"><h3>Listar archivo</h3></a></td>
			</tr>
		</table>
		
	</body>
</html>