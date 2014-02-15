<html>
<head>
</head>
<body>


<?php

function valida_foto($fotos){
	$rdo=0;
	if(ereg("[Jj][Pp][Gg]$",$fotos)) $rdo=1;
	if(ereg("[Gg][i][Ff]$",$fotos)) $rdo=1;
	if(ereg("[Bb][Mm][Pp]$",$fotos)) $rdo=1;
	if(ereg("[pP][Nn][Pp]$",$fotos)) $rdo=1;
	return $rdo;

}

function crea_tumbs($foto){
	
	if(!is_dir('fotos/tumbs'))
		mkdir('fotos/tumbs', 7777);
	if(!is_file('fotos/tumbs/MINI-$foto')){
		system ("convert -sample 40x40 /fotos/$foto /fotos/tumbs/MINI-$foto");
		echo "hola2";
	}

	
}


if ($gestor = opendir('fotos')) {
	echo "<table border=1>";
	echo "<tr>";
	$i=0;
    	while (false !== ($entrada = readdir($gestor))) {
       		 if ($entrada != "." && $entrada != ".." && valida_foto($entrada)) {
       		 	echo "MINI-$entrada";
       		 	crea_tumbs($entrada);
            		if($i==4){
						$i=0;
						echo "</tr>";
						echo "<tr>";
					}

				$i++;
				echo "<td>";
				echo"<a href=fotos/tumbs/MINI-$entrada><img src=fotos/$entrada width=100 heigth=100></a>";
				echo "</td>";
		}
        
    	}
	echo "</tr>";
	echo "</table>";
    	closedir($gestor);
}
?>
</body>
</html>