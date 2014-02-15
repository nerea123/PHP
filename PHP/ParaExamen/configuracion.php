<?php
//Constantes de acceso a la BD
DEFINE("DB_HOST", "localhost");
DEFINE("DB_USER", "root");
DEFINE("DB_PASSWORD", "sistemas");
DEFINE("DB_NAME", "curso_php");
define("VISITA_PAGINA", 2);
session_start();
if(!isset($_SESSION['idioma']))
	$_SESSION['idioma']="ES";

function cabecera_html($titulo_pagina){
   //Inserta la cabecera HTML de una p�gina web
    echo "<html> \n";
    echo "<head> \n";
    echo "<title>$titulo_pagina</title> \n";
	?>
	<style type="text/css">
		th{background-color:#9999FF;color:#FFFFFF};
		td{color:#0000CC};
		.titulo{color:gray;background-color:#9999FF;font-family:Arial, Helvetica, sans-serif;font-size:20pt;font-weight:700}
	</style>
	<?php 
	echo "<p align='right'><a href=\"idioma.php\">".idioma("general","cambia",$_SESSION['idioma'])."</a></p>";
    echo "</head> \n";
    echo "<body> \n";
} //Fin de la funcion cabecera_html

function pie_html(){
    //Inserta el pie HTML de una p�gina web
    echo "</body> \n";
    echo "</html>";
} //fin de la funcion pie_html

function idioma($pag,$text,$idioma){
	$con=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		if(!$con || !mysql_select_db(DB_NAME, $con))
			die("error conectando a la base de datos ".mysql_error());
		else {
			$sql="select textoFinal from idiomas where nombrePag='$pag' and nombreTexto='$text' and idioma='$idioma'";
			$res=mysql_query($sql,$con);
		
			$filas = mysql_num_rows($res);
	
	if ($filas != 0) {
		while ($linea = mysql_fetch_array($res)) {
			
			return $linea['textoFinal'];
		}
	}
		return "";
		
	}
}
    
?>