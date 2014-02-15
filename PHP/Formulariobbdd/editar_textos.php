<?php

	include '../validaciones.php';
	include 'configuracion.php';
    $error=array();
	
	$pagina=$_REQUEST['pagina'];
	$texto=$_REQUEST['texto'];
	$idioma=$_REQUEST['idioma'];
	$textoFinal=trim($_REQUEST['texto_idioma']);
	
	
	if($pagina == "--")
		$error['pagina']="<font color='red'>Debes elegir un formulario</font>";
	if($texto == "--")
		$error['texto']="<font color='red'>Debes elegir un texto</font>";
	if($idioma == "--")
		$error['idioma']="<font color='red'>Debes elegir un idioma</font>";
	if(strlen($textoFinal)==0)
		$error['texto_idioma']="<font color='red'>Debes escribir el texto nuevo</font>";
	else if(valida_numeros($textoFinal))
		$error['texto_idioma']="<font color='red'>El texto nuevo no puede ser numeros</font>";
	
	$serial=urlencode(serialize($error));
	
	if(sizeof($error)>0)
		header("location:actualiza_textos.php?".$_SERVER['QUERY_STRING'] ."&errores=$serial");
	else {
		$con=@mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
                if (!$con || !mysql_select_db(DB_NAME, $con)) {
               
                    echo "<option value=\"ERROR\">Error en el acceso a la base de datos</option>";
                } else {
                	$sql="update idiomas set textoFinal='$textoFinal' where nombrePag='$pagina' and nombreTexto='$texto' and idioma='$idioma'";
					$res=mysql_query($sql);
					
					if(mysql_affected_rows($con) )
			
						header("location:ver.php");
			else {
				header("location:modificar.php?" . $_SERVER['QUERY_STRING'] ."&error_bd=1");
			}
		}	
	}
?>