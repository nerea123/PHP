<?php
//La p‡gina insertar visita recibe los datos del formulario en la cabecera HTML con el metodo GET
//y si hay un error los devuelve en la cabecera con $_SERVER['QUERY_STRING']

include("configuracion.php");
session_start();

//recibimos los datos del formulario
$nombre=trim($_REQUEST["Nombre"]);
$edad=trim($_REQUEST["Edad"]);
$comentario=trim($_REQUEST["Comentario"]);
$errores = false;

//Comprobamos si falta algun campo
if ($nombre=="") {
	$_SESSION["error_nombre"] = true;
	$errores = true;
} else unset($_SESSION["error_nombre"]);
	
if ($edad=="") {
	$_SESSION["error_edad"] = true;
	$errores = true;
} else unset($_SESSION["error_edad"]);

if ($comentario=="") {
	$_SESSION["error_comentario"] = true;
	$errores = true;
} else unset($_SESSION["error_comentario"]);

if ($errores) {
	//Hay errores en el formulario volvemos a mostrarlo con los errores
	$_SESSION["nombre"] = $nombre;
	$_SESSION["edad"] = $edad;
	$_SESSION["comentario"] = $comentario;
	
	header("location:nueva_visita.php?");
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
		
		unset($_SESSION["nombre"]);
		unset($_SESSION["edad"]);
		unset($_SESSION["comentario"]);
		unset($_SESSION["error_comentario"]);
		unset($_SESSION["error_edad"]);
		unset($_SESSION["error_nombre"]);
				  
		//Mostramos el libro de visitas con la nueva insertada
		header("location:libro_visitas.php?formulario=nueva_visita.php");
	} else {
		//En caso de error volvemos a mostrar el formulario
		$_SESSION["nombre"] = $nombre;
		$_SESSION["edad"] = $edad;
		$_SESSION["comentario"] = $comentario;
		header("location:nueva_visita.php?");
	}
}
?>