<?php
//La p‡gina insertar visita recibe los datos del formulario en la cabecera HTML con el metodo GET
//y si hay un error los devuelve en la cabecera con $_SERVER['QUERY_STRING']

include("configuracion.php");

//recibimos los datos del formulario
$nombre=trim($_REQUEST["Nombre"]);
$edad=trim($_REQUEST["Edad"]);
$comentario=trim($_REQUEST["Comentario"]);

//Comprobamos si falta alguno
if (($nombre=="") or ($edad=="") or ($comentario=="")) {
	header("location:nueva_visita.php?" . $_SERVER['QUERY_STRING']);
} else {
	//Si no faltan datos insertamos en el fichero
	$f=fopen(FICHERO_LIBRO,"a");  //abro archivo para leer al final, si no existe lo crea
	if ($f)	{
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
				
		//Siempre cerramos un fichero tras haber terminado con el
		fclose($f);
		//Mostramos el libro de visitas con la nueva insertada
		header("location:libro_visitas.php?formulario=nueva_visita.php");
	} else {
		//En caso de error volvemos a mostrar el formulario
		header("location:nueva_visita.php?" . $_SERVER['QUERY_STRING']);
	}
}
?>