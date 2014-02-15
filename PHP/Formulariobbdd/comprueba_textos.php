<?php
   include 'configuracion.php';
   include '../validaciones/validaciones.php';
   
   $formulario=trim($_REQUEST['formulario']);
   $texto=trim($_REQUEST['texto']);
   $idioma=trim($_REQUEST['idioma']);
   $result=trim($_REQUEST['result']);
   $errores=array();
   
   if(esta_vacio($formulario))
   		$errores['formulario']="<font color='red'>El campo formulario es obligatorio</font>";
   else if(!valida_cadena_sin_espacios($formulario))
   		$errores['formulario']="<font color='red'>El campo formulario tiene que ser un texto sin espacios</font>";
   
   if(esta_vacio($texto))
   		$errores['texto']="<font color='red'>El campo texto es obligatorio</font>";
   else if(!valida_cadena_sin_espacios($texto))
   		$errores['texto']="<font color='red'>El campo texto tiene que ser un texto sin espacios</font>";
   
  if(esta_vacio($idioma))
   		$errores['idioma']="<font color='red'>El campo idioma es obligatorio</font>";
   else if(!valida_cadena_sin_espacios($idioma))
   		$errores['idioma']="<font color='red'>El campo idioma tiene que ser un texto sin espacios</font>";
   
   if(esta_vacio($result))
   		$errores['result']="<font color='red'>El campo texto final es obligatorio</font>";
   else if(!valida_cadena_con_espacios($result))
   		$errores['result']="<font color='red'>El campo texto final tiene que ser un texto </font>";
   		
   	if(sizeof($errores)>0){
   			
   		$serial=urlencode(serialize($errores));
		header("location:introducir_textos.php?". $_SERVER['QUERY_STRING'] ."&errores=$serial");
   	}
	else {
	
		$con=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		if(!$con || !mysql_select_db(DB_NAME, $con))
			die("error conectando a la base de datos ".mysql_error());
		else {
			$sql="insert into idiomas  values ( '$formulario','$texto','$idioma','$result')";
			$res=mysql_query($sql,$con);
			
			if(mysql_affected_rows($con))
			
				header("location:ver.php");
			else {
				header("location:formulario_mi.php?" . $_SERVER['QUERY_STRING']) ."&error_bd=1";
			}
	
	}
  } 	
 
?>