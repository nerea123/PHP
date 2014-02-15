<html>
	<head></head>
	<body>
<?php

	$v[1]=90;
	$v[30]=7;
	$v['e']=99;
	$v['hola']=43;
	
	foreach ($v as $key => $valor) {
		echo "El elemento del indice $key vale $valor <br>";
	}
	    
?>
</body>
</html>