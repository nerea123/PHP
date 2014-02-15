<?php

    $letras=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

	foreach ($letras as $letra) {
		echo "$letra";
	}
	echo "<br>";
	foreach ($letras as $letra) {
		echo strtoupper($letra);
	}
?>