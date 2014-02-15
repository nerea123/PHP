<?php

include 'configuracion.php';

$errores=array();

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
		$serial=urlencode(serialize($errores));
		
	
	if(sizeof($errores) >0 )
		header("location:formulario_mi.php?" . $_SERVER['QUERY_STRING'] ."&errores=$serial");
	else {
		
		$con=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		if(!$con || !mysql_select_db(DB_NAME, $con))
			die("error conectando a la base de datos ".mysql_error());
		else {
			$sql="insert into libro_visitas (nombre,edad,comentario) values ( '$nombre',$edad,'$comentario')";
			$res=mysql_query($sql,$con);
			
			if(mysql_affected_rows($con))
			
				header("location:ver.php");
			else {
				header("location:formulario_mi.php?" . $_SERVER['QUERY_STRING']) ."&error_bd=1";
			}
		}
	}	
	
?>