<style type="text/css">
		th{background-color:#9999FF;color:#FFFFFF};
		td{color:#0000CC};
		.titulo{color:gray;background-color:#9999FF;font-family:Arial, Helvetica, sans-serif;font-size:20pt;font-weight:700}
	</style>
<?php

	$arrayArchivos;
	echo "<h1 class='titulo'>Listado de archivos</h1>";
	echo "<table border=1 bgcolor=\"gray\" cellpadding=\"5\" cellspaccing=\"3\">
			<tr>
			<th>Archivo</th>
			<th>Tamano</th>
			<th>Tipo</th>
			<th>Extension</th>
			<th>Mime type</th></tr>";
	
    if ($dir = opendir('./descargas'))
	{


	while (false !== ($archivo = readdir($dir)))
	{
		
		if ($archivo!="." && $archivo!="..")
		{
			$arrayArchivos[]=$archivo;
		}
	}

	
	}
	closedir($dir);
	
	sort($arrayArchivos);
	
	foreach ($arrayArchivos as $archivo ){
		
			$trozos = explode(".", $archivo); 
			$extension = end($trozos);
			echo "<tr><td><a href='descargas/$archivo'>$archivo</td>";
			echo "<td>".filesize("./descargas/$archivo")."</td>";
			echo "<td>".filetype("./descargas/$archivo")."</td>";
			echo "<td> $extension</td>";
			echo "<td>".mime_content_type("./descargas/$archivo")."</td></tr>";;
		
	}
	
	
	
	
	echo "</table><br><a href='subir.php'>Subir archivo</a>";
?>