<?php
	include("configuracion.php");
	$nombre=trim($_REQUEST["Nombre"]);
	$edad=trim($_REQUEST["Edad"]);
	$comentario=trim($_REQUEST["Comentario"]);

	if (($nombre=="") or ($edad=="") or ($comentario==""))
	{
		header("location:nueva_visita.php?" . $_SERVER['QUERY_STRING']);
	}
	else
	{
		//unset($_SESSION["Nombre"],$_SESSION["Edad"],$_SESSION["Comentario"]);
		$f=fopen(FICHERO_LIBRO,"a");  //abro archivo para leer al final, si no existe lo crea
		if ($f)
		{
				//A continuaci�n preparo una cadena con los tres datos de la visita
				//utilizando una cadena separadora.
				$comentario=str_replace("\n","<br>",$comentario);  //
				$linea=$nombre.SEPARADOR.$edad.SEPARADOR.$comentario."\r\n";
				fwrite($f,$linea); //Guarda l�nea en el fichero. De esta manera utilizo
								   //una l�nea por registro.Se ha de tener en cuenta
								   //que con esta soluci�n  debe tenerse cuidado con los caracteres
								   //de fin de l�nea en el �rea de texto donde se introduce
								   //el comentario. Lo que hago es cambiar el car�cter \n por 
								   // la cadena <br> antes de guardar los datos en el fichero
				
				fclose($f);
				header("location:libro_visitas.php");
		}
		else
		{
			header("location:error.html");
		}
	}
?>