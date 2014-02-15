<?php
    
    $nombre=$_REQUEST['nombre'];
    $coment=$_REQUEST['text'];
	$edad=$_REQUEST['edad'];
	
	
	include ('visitaConf.php');
	
	$archivo=fopen("visitas.txt", "a");
	if($archivo){
		
		if($nombre == "" || $coment== "" || $edad== ""){
			
			header("location:indexVisita.html");
		}
		
		else{
			$coment=str_replace("\n","<br>",$coment);
			fwrite($archivo, $nombre.SEPARADOR.$edad.SEPARADOR.$coment."\r\n");
			fclose($archivo);
			header("location:leerVisitas.php");
		}
	}
?>