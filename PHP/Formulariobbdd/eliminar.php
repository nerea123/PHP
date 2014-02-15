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
    $id=$_REQUEST['visita'];
	
	if($id == "" ){
		echo "Error, no se ha encontrado el identificador de la visita";
	}else{
		$con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		if (!$con || !mysql_select_db(DB_NAME, $con)) 
			echo "<h3 align=\"center\"> Error en el acceso a la base de datos. Error : \" " . mysql_error() . "\"</h2>";
		else {
			$sql="Delete from libro_visitas where id=$id";
			$res=mysql_query($sql,$con);
			
			if(mysql_affected_rows($con))
				echo "<h3 align=\"center\"> Visita eliminada con exito</h2>";
			
			else
				echo "<h3 align=\"center\"> No se ha encontrado ninguna visita con ese identificador</h2>";
		}
		
	}
    
?>
</td></tr>
</table>
<br>
<p align="right">
	<a href="ver.php">Volver al libro de visitas</a>
</p>
</body>
</html>