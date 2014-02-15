
<?php
   include 'configuracion.php';
   
  
   $id=$_REQUEST['visita'];
  
   $nombre="";
	$edad="";
	$comentario="";
	
   
   cabecera_html("Modificar");
   
 function leeDatos(){
 	global $id;
	global $comentario;
	global $edad;
	global $nombre;
	
 	$con=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		if(!$con || !mysql_select_db(DB_NAME, $con))
			die("error conectando a la base de datos ".mysql_error());
		else {
			$sql="select * from libro_visitas where id=$id";
			$res=mysql_query($sql,$con);
			$filas = mysql_num_rows($res);
	
			if ($filas != 0) {
				while ($linea = mysql_fetch_array($res)) {
					$nombre=$linea['nombre'];
					$edad=$linea['edad'];
					$comentario=$linea['comentario'];
					}
			}
			else {
				echo "<h1>El libro no tiene visitas</h1>";
			}
		}
 	
 }
 
  function muestra_form(){
  	global $comentario;
	global $edad;
	global $nombre;
	global $id;
	
  	echo "<form action='modificar.php' method='get'>";
  
					echo "<table  border=\"1\"";
					echo "bgcolor=\"gray\" cellpadding=\"5\" cellspaccing=\"3\">";
					echo "<tr><th>".idioma("general","nombre",$_SESSION['idioma'])."</th><td><input type='text' value='$nombre' name='nom'></td>";
					echo "<tr><th>".idioma("general","edad",$_SESSION['idioma'])."</th><td><input type='text' value='$edad' name='edad'></td>";
					echo "<tr><th>".idioma("general","comentario",$_SESSION['idioma'])."</th><td><input type='text' value='$comentario' name='comentario'></td>";
					echo "<input type='hidden' value='$id' name='visita'>";
					echo "</table><br>";
		
	
   
	?>
	
	<input name="reset" type="reset" value="reset">
	<input name="modifica" type="submit" value="modifica">
	</form>
	<?php
	}

function muestra_errores(){
	
	global $comentario;
	global $edad;
	global $nombre;
	global $id;
	
	
	if (isset($_REQUEST["error_bd"])) {
        	echo "<center><font color='red'>Error al insertar la visita. Por favor intentelo de nuevo</font></center><br>";
      }
	
	$errores=array();

	 $id=$_REQUEST['visita'];
    $nombre=trim($_REQUEST['nom']);
	$edad=trim($_REQUEST['edad']);
	$comentario=trim($_REQUEST['comentario']);
	
	if($nombre == ""){
		$errores['nombre']="El campo nombre es obligatorio";
	}else if(ord($nombre) <65 || ord($nombre) > 90 && ord($nombre) < 97 || ord($nombre)>122){
		$errores['nombre']="El campo nombre debe ser un texto";
	}
	
		if($edad == ""){
		$errores['edad']="El campo edad es obligatorio";
	} else if(ord($edad) < 48 || ord($edad) > 57){
		$errores['edad']="El campo edad debe ser un numero";
	}
		
		if($comentario == ""){
		$errores['comentario']="El campo comentario es obligatorio";
	}
		return $errores;
}

if(isset($_REQUEST['modifica'])){
	
	
	global $comentario;
	global $edad;
	global $nombre;
	global $id;
	
	$errores=muestra_errores();
	
	if(sizeof($errores) >0 ){
			
		foreach ($errores as $error)
        echo "<center><font color='red'>$error</font></center><br>";  
		muestra_form();
	}
	
		
	else {
		$con=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		if(!$con || !mysql_select_db(DB_NAME, $con))
			die("error conectando a la base de datos ".mysql_error());
		else {
			$sql="update libro_visitas set nombre='$nombre', edad=$edad, comentario='$comentario' where id=$id";
			$res=mysql_query($sql,$con);
			echo mysql_affected_rows($con);
			if(mysql_affected_rows($con) )
			//echo mysql_affected_rows($con);
				header("location:ver.php");
			else {
				header("location:modificar.php?" . $_SERVER['QUERY_STRING'] ."&error_bd=1");
			}
		}
	}
}
else {
	leeDatos();
	muestra_form();
}


?>