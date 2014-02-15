<?php
$errores_formulario=array();
	echo "holaaa11";
   function valida(){
   
  	global $errores_formulario;
	
  	if($_REQUEST['nom']== "")
		$errores_formulario["nombre"]="El campo nombre es obligatorio";
	if($_REQUEST['edad']== "")
		$errores_formulario["edad"]="El campo edad es obligatorio";
	echo "holaaa";
	
	if(sizeof($errores_formulario) > 0){
	$serial=urlencode(serialize($errores_formulario));
	header("location:pr.php?errores=$serial");
	}
	else {
		echo "bien";
	}
  }
   
   	valida();
?>