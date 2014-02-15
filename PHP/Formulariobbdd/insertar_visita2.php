<?php
//recuperamos los campos del formulario
$nombre=trim($_REQUEST["Nombre"]);
$edad=trim($_REQUEST["Edad"]);
$comentario=trim($_REQUEST["Comentario"]);

if (($nombre=="") or ($edad=="") or ($comentario=="")) {
    //falta algun campo, volvemos al formulario para que sea completado
	header("location:formulario_2.php?" . $_SERVER['QUERY_STRING']);
} else {
	include("configuracion.php");
	//Tratamos de conectar con la BD
	$con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$con || !mysql_select_db(DB_NAME, $con)) {
		die("Error conectando a la BD: " . mysql_error());
	} else {
		//Generamos la sentencia SQL de insercion en una variable
		$sql =    "INSERT INTO libro_visitas "
			. "(nombre, edad, comentario) "
			. "VALUES "
			. "('$nombre', '$edad', '$comentario')";
		//Lanzamos la sentencia SQL de inserci—n en la BD
		//echo $sql;
		$res = mysql_query($sql, $con);
		//echo "Valor mysql_affected_rows($res) : " . mysql_affected_rows($con) . " valor";
		if (mysql_affected_rows($con)) { 
			//Insercion correcta mostramos el formulario
			header("location:libro_visitas.php?formulario=formulario_2.php"); //Mostramos el libro de visitas
		} else {
			//se ha producido un error al acceder la bd
			//mostramos el formulario de nuevo con los datos y el mensaje de error
			header("location:formulario_2.php?" . $_SERVER['QUERY_STRING'] . "&error_bd=1");	
		}
	}
}
?>