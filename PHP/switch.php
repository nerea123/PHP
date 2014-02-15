<?php
$hora=10;

switch($hora)
{

case 10:
	echo"Hola 10";
case 9:
	echo"Hola 9";
case 8:
	echo"Hola 8";
default:
	echo "default <br>";


}

#si no se pone break se ejecutan todas las sentencias debajo de la k se cumple

switch($hora)
{

case 10:
	echo"Hola 10";
	break;
case 9:
	echo"Hola 9";
	break;
case 8:
	echo"Hola 8";
	break;
default:
	echo "default";
	break;


}


?>