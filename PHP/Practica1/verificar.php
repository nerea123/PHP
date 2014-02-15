<?php
   
   include 'usuarios.php';
   
   	$usu=trim($_REQUEST["usuario"]);
	$pss=trim($_REQUEST["pss"]);
	
	
	if (($usu=="") or ($pss==""))
	{
		header("location:login.html?" . $_SERVER['QUERY_STRING']);
	}
   
   $error=TRUE;
	
	foreach($usuarios as $key =>$usuario){
		
		if($key == $usu && $usuario == $pss){
			$error=FALSE;
			escribe($usu, $error);
			header("location:ok.php?" . $_SERVER['QUERY_STRING']);
			break;
		}
	}
	if($error){
		escribe($usu, $error);
		header("location:error.html?" . $_SERVER['QUERY_STRING']);
	}
	
	
	 function escribe($usu,$error){
   	
	$f=fopen("accesos.txt", "a");//abre archivo para leer al final, si no existe lo crea
	
		if ($f)
		{
			if(!$error)
				fwrite($f, "El usuario $usu ha accedido al sistema \r\n");
			else {
				fwrite($f, "Intento fallido del usuario $usu \r\n");
			}
			fclose($f);
		}
   }
   
?>