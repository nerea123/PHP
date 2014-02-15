<?php
include("configuracion.php");
cabecera_html("Editar visita");
?>
<table border=0 align=center cellspacing="5">
<tr>
    <td class="titulo" align="center"><?=leer_texto("form_editar_visita", "titulo1", $_SESSION["idioma"])?></td>
</tr>
<tr>
    <td>
<?php
//recuperamos los campos del formulario
$nombre=trim($_REQUEST["Nombre"]);
$edad=trim($_REQUEST["Edad"]);
$comentario=trim($_REQUEST["Comentario"]);
$id = $_REQUEST["visita"];

if (($nombre=="") or ($edad=="") or ($comentario=="") or ($id == "")) {
    //falta algun campo, volvemos al formulario para que sea completado
    echo "<h2 align=\"center\"> No se ha podido editar la visita, falta algœn dato.</h2>";
} else {	
	//Tratamos de conectar con la BD
	$con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$con || !mysql_select_db(DB_NAME, $con)) {
		echo "<h2 align=\"center\"> Error al conectar a la BD : " . mysql_error() . "</h2>";
	} else {
		//Generamos la sentencia SQL de insercion en una variable
		$sql = "UPDATE libro_visitas SET nombre = '$nombre', edad = '$edad', comentario = '$comentario' WHERE id = $id";
		//Lanzamos la sentencia SQL de inserci—n en la BD
		$res = mysql_query($sql, $con);
		 if (mysql_affected_rows($con)) { 
                    //Insercion correcta
                    echo "<h2 align=\"center\"> Visita editada con exito</h2>";
                } else {
                    //no se ha editado ningun elemento
                    echo "<h2 align=\"center\"> No se ha realizado ninguna modificacion.</h2>";
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
