<?php

function analiza($value){
	$arrayPalabras;
	$palabras=0;
	$espacios=0;
	echo "FRASE A ANALIZAR <font color='blue'>$value</font> <br><br>";
	
	echo "<font color='red'>".strlen($value)." </font> letras<br>";
	for($i=0;$i<strlen($value);$i++){
			if($value[$i]== " "){
				$palabras++;
				$espacios++;
			}
				
		}
	$palabras++;
	
	echo "<font color='red'> $palabras </font> palabras <br> <font color='red'> $espacios </font> espacion en blanco<br>";
	
	$arrayPalabras= explode(" ", $value);
	
	for($i=0;$i<sizeof($arrayPalabras);$i++){
		
		echo " <font color='red'> $arrayPalabras[$i] ".strlen($arrayPalabras[$i])." </font> letras<br>";
		
	}
}

analiza("El perro de San Roque no tiene rabo");
  
?>
