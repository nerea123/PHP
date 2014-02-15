<?php
		define("SEPARADOR","$***$");
		define("FICHERO_LIBRO","./visitas.txt");
		
function cabecera_html($titulo_pagina){
   //Inserta la cabecera HTML de una p‡gina web
    echo "<html> \n";
    echo "<head> \n";
    echo "<title>$titulo_pagina</title> \n";
    echo "</head> \n";
    echo "<body> \n";
} //Fin de la funcion cabecera_html

function pie_html(){
    //Inserta el pie HTML de una p‡gina web
    echo "</body> \n";
    echo "</html>";
} //fin de la funcion pie_html
    
?>