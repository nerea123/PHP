<html>
<head>
</head>
<body>


<?php
if ($gestor = opendir('fotos')) {
	echo "<table border=1>";
	echo "<tr>";
	$i=0;
    	while (false !== ($entrada = readdir($gestor))) {
       		 if ($entrada != "." && $entrada != "..") {
            		if($i==4){
				$i=0;
				echo "</tr>";
				echo "<tr>";
			}

			$i++;
			echo "<td>";
			echo"<a href=fotos/$entrada><img src=fotos/$entrada></a>";
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