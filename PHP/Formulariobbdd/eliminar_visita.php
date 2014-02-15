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
//recuperamos los campos del formulario
$id = $_REQUEST["visita"];

if ($id == "") {
    //No se ha enviado el id de la visita
    echo "<h3 align=\"center\"> Error en el acceso al eliminar la visita. No se ha encontrado el identificador</h2>";
} else {
    include("configuracion.php");
    //Tratamos de conectar con la BD
    $con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if (!$con || !mysql_select_db(DB_NAME, $con)) {
        //die("Error conectando a la BD: " . mysql_error());
        echo "<h3 align=\"center\"> Error en el acceso a la base de datos. Error : \" " . mysql_error() . "\"</h2>";
    } else {
            //Generamos la sentencia SQL de insercion en una variable
            $sql =    "DELETE FROM libro_visitas "
                    . "WHERE id = $id";
            //Lanzamos la sentencia SQL de inserci—n en la BD
            //echo $sql;
            $res = mysql_query($sql, $con);
            //echo "Valor mysql_affected_rows($res) : " . mysql_affected_rows($con) . " valor";
            if (mysql_affected_rows($con)) { 
                    //Insercion correcta
                    echo "<h3 align=\"center\"> Visita eliminada con exito</h2>";
            } else {
                    //no se ha eliminado ningun elemento
                    echo "<h3 align=\"center\"> No se ha encontrado ninguna visita con ese identificador ($id).</h2>";
            }
    }
}
?>
</td></tr>
</table>
<br>
<p align="right">
	<a href="libro_visitas.php">Volver al libro de visitas</a>
</p>
</body>
</html>