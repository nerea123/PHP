<html>
<head>
	<title>Ejemplo de Formulario que accede a Bases de Datos</title>
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
include("configuracion.php");
//Conectamos con la BD	
$con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if (!$con || !mysql_select_db(DB_NAME, $con)) {
	//Error en la conexion con la BD
	echo "<h3 align=\"center\"> Error en el acceso a la base de datos. Error : \" " . mysql_error() . "\"</h2>";
	//die("Error conectando a la BD: " . mysql_error());
} else {
	//Consultamos los datos de la BD
	$sql = "SELECT * FROM libro_visitas";
	$res = mysql_query($sql);
	$filas = mysql_num_rows($res);
	
	if ($filas != 0) { //comprobamos si la consulta ha devuelto datos
		//La consulta devuelve datos y los mostramos
		/*
		for ($i = 0; $i < $filas; $i++) {
			$nombre = mysql_result($res, $i, "nombre");
			$edad = mysql_result($res, $i, "edad");
			$comentario = mysql_result($res, $i, "comentario");
			$id = mysql_result($res, $i, "id");
			echo "<table  border=\"1\"";
			echo "bgcolor=\"gray\" cellpadding=\"5\" cellspaccing=\"3\">";
			echo "<tr><th>NOMBRE</th><td>$nombre</td>";
			echo "<tr><th>EDAD</th><td>$edad a&ntilde;os</td>";
			echo "<tr><th>COMENTARIO</th><td>$comentario</td>";
			echo "<tr><th>Eliminar entrada</th><td><a href=\"eliminar_visita.php?visita=$id\">Eliminar</a></td>";
			echo "</table><br>";
		}
		*/
		//Otra forma de recorrer la consulta
		while ($linea = mysql_fetch_array($res)) {
			echo "<table  border=\"1\"";
			echo "bgcolor=\"gray\" cellpadding=\"5\" cellspaccing=\"3\">";
			echo "<tr><th>NOMBRE</th><td>{$linea['nombre']}</td>";
			echo "<tr><th>EDAD</th><td>{$linea['edad']} a&ntilde;os</td>";
			echo "<tr><th>COMENTARIO</th><td>{$linea['comentario']}</td>";
			echo "<tr><th>Eliminar entrada</th><td><a href=\"eliminar_visita.php?visita={$linea['id']}\">Eliminar</a></td>";
			echo "</table><br>";
		}
		
	} else {
		//La consulta no devuelve datos. Indicamos al usuario que no hay datos
		echo "<h2 align=\"center\"> El libro de visitas no tiene registros</h2>";
	}
}
?>
</td></tr>
</table>
<br>
<p align="right">
	<a href="formulario_2.php">Introducir visita</a>
</p>
</body>
</html>