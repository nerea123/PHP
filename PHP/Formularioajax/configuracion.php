<?php
//Constantes de acceso a la BD
DEFINE("DB_HOST", "localhost");
DEFINE("DB_USER", "root");
DEFINE("DB_PASSWORD", "");
DEFINE("DB_NAME", "curso_php");
DEFINE("VISITAS_PAGINA", 2);

//Comprobamos el idioma. Todas las paginas que incluyan este archivo tendran idioma
session_start();
if (!isset($_SESSION["idioma"])) {
  //El idioma por defecto es espa–ol
  $_SESSION["idioma"] = "ES";
}

function cabecera_html($titulo_pagina){
   //Inserta la cabecera HTML de una p‡gina web
    $idioma = $_SESSION["idioma"];
   
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"> \n";
    echo "<html xmlns=\"http://www.w3.org/1999/xhtml\"> \n";
    echo "<head> \n";
    echo "<title>$titulo_pagina</title> \n";
    echo "<style type=\"text/css\">";
    echo "th{background-color:#9999FF;color:#FFFFFF};";
    echo "td{color:#0000CC};";
    echo "titulo{color:gray;background-color:#9999FF;font-family:Arial, Helvetica, sans-serif;font-size:20pt;font-weight:700};";
    echo "</style>";
    echo "</head> \n";
    echo "<body> \n";
    echo "<p align=\"right\"><a href=\"formulario_idioma.php\">" . leer_texto("general", "cambio_idioma", $idioma) . "</a></p>";
} //Fin de la funcion cabecera_html

function pie_html(){
    //Inserta el pie HTML de una p‡gina web
    echo "</body> \n";
    echo "</html>";
} //fin de la funcion pie_html

function leer_texto ($pagina, $texto, $idioma){
	//lee el texto de una pagina
	$con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$con || !mysql_select_db(DB_NAME, $con)) {
	    //Ha habido un error al conectar a la BD
	    return "";
	} else {
	    //Lanzamos la consulta a la BD
	    $sql = "SELECT traduccion FROM texto_idioma WHERE pagina = '$pagina' AND texto = '$texto' AND idioma = '$idioma'";
	    $res = mysql_query($sql, $con);
	    if (mysql_num_rows($res)){
		$linea = mysql_fetch_array($res);
		return $linea["traduccion"];
	    } else
		return "";
	}
}

?>