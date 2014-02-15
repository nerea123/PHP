<?php
include("configuracion.php");
cabecera_html("Insertar visita");
?>
<body>
<table border=0 align=center cellspacing="5">
<tr>
	<td class="titulo" align="center"><?=leer_texto("insertar_visita", "titulo1", $_SESSION["idioma"])?></td>
</tr>
<tr>
	<td>
<?php
//recuperamos los campos del formulario
$nombre=trim($_REQUEST["Nombre"]);
$edad=trim($_REQUEST["Edad"]);
$comentario=trim($_REQUEST["Comentario"]);

if (($nombre=="") or ($edad=="") or ($comentario=="")) {
  //falta algun campo, volvemos al formulario para que sea completado
  echo "<h2 align=\"center\"> No se ha podido insertar la visita. Por favor intentelo de nuevo.</h2>";
} else {
	//Tratamos de conectar con la BD
	$con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$con || !mysql_select_db(DB_NAME, $con)) {
		echo "<h2 align=\"center\"> Error en el acceso a la base de datos. Error : \" " . mysql_error() . "\"</h2>";
	} else {
		//Generamos la sentencia SQL de insercion en una variable
		$sql =    "INSERT INTO libro_visitas "
			. "(nombre, edad, comentario) "
			. "VALUES "
			. "('$nombre', '$edad', '$comentario')";
		//Lanzamos la sentencia SQL de inserci—n en la BD
		$res = mysql_query($sql, $con);
		if (mysql_affected_rows($con)) { 
			//Insercion correcta mostramos el formulario
			echo "<h2 align=\"center\"> Visita insertada con exito</h2>";
		} else {
			//no se ha insertado ningun elemento
                    echo "<h2 align=\"center\"> No se ha podido insertar la visita. Por favor intentelo de nuevo.</h2>";
		}
	}
}
?>
	</td>
</tr>
</table>
<br>
<p align="right">
	<a href="libro_visitas.php"><?=leer_texto("general", "volver_libro", $_SESSION["idioma"])?></a>
</p>
<?php
pie_html();
?>
