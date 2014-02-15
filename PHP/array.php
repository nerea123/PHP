<?php

$color=array('rojo'=>101,'verde'=>51,'azul'=>255);

foreach ($color as $valor)
	print "<b>Valor</b>: $valor<br> \n";

foreach($color as $clave => $valor)
	print "<b>Clave</b>: $clave; <b>Valor</b>: $valor <br> \n";
?>