<?php
	include("configuracion.php");
        //recuperamos los campos del formulario
	$nombre=trim($_REQUEST["Nombre"]);
	$edad=trim($_REQUEST["Edad"]);
	$comentario=trim($_REQUEST["Comentario"]);

	if (($nombre=="") or ($edad=="") or ($comentario=="")) {
            //falta algun campo, volvemos al formulario para que sea completado
		header("location:formulario_2.php?" . $_SERVER['QUERY_STRING']);
	} else	{
	    $f=fopen(FICHERO_LIBRO,"a");  //abro archivo para leer al final, si no existe lo crea
            if ($f){
		//A continuación preparo una cadena con los tres datos de la visita
		//utilizando una cadena separadora.
		$comentario=str_replace("\n","<br>",$comentario);  //
		$linea=$nombre.SEPARADOR.$edad.SEPARADOR.$comentario."\r\n";
		fwrite($f,$linea); //Guarda línea en el fichero. De esta manera utilizo
                                //una línea por registro.Se ha de tener en cuenta
				//que con esta solución  debe tenerse cuidado con los caracteres
				//de fin de línea en el área de texto donde se introduce
				//el comentario. Lo que hago es cambiar el carácter \n por 
				// la cadena <br> antes de guardar los datos en el fichero
				
		fclose($f); //cerramos siempre el fichero tras utilizarlo
		header("location:libro_visitas.php?formulario=formulario_2.php"); //Mostramos el libro de visitas
	    } else {
                //se ha producido un error al acceder al fichero
                //mostramos el formulario de nuevo con los datos
		header("location:formulario_2.php?" . $_SERVER['QUERY_STRING'] . "&error_fichero=1");
                //mosramos el formulario vacio
                //header("location:formulario_2.php?");
	    } 
	}
?>