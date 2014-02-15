

<?php
$nom="";
$ape1="";
$ape2="";
$dir="";
$cp="";
$error=array();

if(isset($_REQUEST['nombre'])){
	$nom=$_REQUEST['nombre'];
}


if(isset($_REQUEST['ap1'])){
	$ape1=$_REQUEST['ap1'];
}

if(isset($_REQUEST['ap2'])){
	$ape2=$_REQUEST['ap2'];
}

if(isset($_REQUEST['dir'])){
	$dir=$_REQUEST['dir'];
}

if(isset($_REQUEST['cp'])){
	$cp=$_REQUEST['cp'];
}

function cabecera(){
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<title>FORMULARIO 1</title>
<script type="text/javascript" src="./validaciones/validar.js"></script>
<script>
function validar(){
	
	var pulsado=0;
	var error=false;
	var valida=true;
	var radio=document.getElementsByName("SEXO");
	var nom=document.getElementById("nombre");
	var dir=document.getElementById("dir");
	var ape1=document.getElementById("ape1");
	var ape2=document.getElementById("ape2");
	var cp=document.getElementById("cp");
	
	/*for(var i=0; i<radio.length; i++ ){
		if(radio[i].checked)
			pulsado=radio[i];
	}
	
	if(nom.value == "" || !isNaN(nom.value )){
		alert("Escribe tu nombre")
		error=true;	
	}
	
	else if(ape1.value == "" || !isNaN(ape1.value )){
		alert("Escribe tu 1 apellido")
		error=true;	
	}
	
	else if(ape2.value == "" || !isNaN(ape2.value )){
		alert("Escribe tu 2 apellido")
		error=true;	
	}
	
	else if(dir.value == "" || !isNaN(dir.value )){
		alert("Escribe tu direccion")
		error=true;	
	}
	
	else if(pulsado == 0){
		alert("Selecciona tu sexo");;
		error=true;
	}
	
	else if(cp.value == "" || isNaN(cp.value )){
		alert("Escribe tu codigo postal")
		error=true;	
	}
	
	return error;
	if(!error)
		document.getElementById("form1").submit();*/
		
		if(vacio(nom.value,"El campo nombre es obligatorio"))
		valida=false;
	if(valida)	
		valida=comprueba_texto(nom.value,"El campo nombre debe de ser texto");
	if(valida)	
		valida=comprueba_texto(ape1.value,"El campo apelido1 debe de ser texto");
	if(valida)	
		valida=comprueba_texto(ape2.value,"El campo apelido2 debe de ser texto");
	if(valida)
		valida=valida_radio(radio,"Debes seleccionar tu sexo")
		
		return valida;
	
	
		
}

</script>
</head>
	
	<?php

}

	function muestraForm(){
		global $nom;
		global $ape1;
		global $ape2;
		global $dir;
		global $cp;
		global $error;
?>	
<BODY>
<FORM action="FORMULARIO3.php" name="form1" method="post" id="form1">
Nombre:<INPUT type="text" name="nombre" size="25" id="nombre" value="<?=$nom?>">
	<?php 
	if(isset($error['nombre']) )  
	echo $error['nombre']; 
	?><BR>
1<SUP>er</SUP>Apellido:<INPUT type="text" name="ap1" size="25" id="ape1" value="<?=$ape1?>">
	<?php 
	if(isset($error['ape1']) )  
	echo $error['ape1']; 
	?><BR>
2� Apellido:<INPUT type="text" name="ap2" size="25" id="ape2" value="<?=$ape2?>">
	<?php 
	if(isset($error['ape2']) )  
	echo $error['ape2']; 
	?><BR>
Direcci�n: <INPUT type="text" name="dir" size="45" id="dir" value="<?=$dir?>">
	<?php 
	if(isset($error['dir']) )  
	echo $error['dir']; 
	?><BR>
C�digo Postal: <INPUT type="text" name="cp" size="5" id="cp"value="<?=$cp?>">
	<?php 
	if(isset($error['cp']) )  
	echo $error['cp']; 
	?><BR>
Ciudad: <SELECT name="ciudad" size="1" id="ciudad">
<OPTION value="VALENCIA">VALENCIA</OPTION>
<OPTION value="SEVILLA">SEVILLA</OPTION>
<OPTION value="BARCELONA">BARCELONA</OPTION>
<OPTION value="MADRID">MADRID</OPTION>
</SELECT>
<BR>
Sexo:<BR>
<INPUT type="radio" name="SEXO" value="hombre" id="hombre">hombre
<INPUT type="radio" name="SEXO" value="mujer" id="mujer" checked="">mujer<BR>
Matriculado (SI/NO): <INPUT type="checkbox" name="matriculado"><br>
<INPUT type="submit" value="ENVIAR" name="enviar"  onclick="return validar();">
<INPUT type="reset" value="BORRAR">
</FORM>
<?php
}

function validaPhp(){
	global $error;
	
	if($_REQUEST['nombre'] == "")
		$error['nombre']="El campo nombre es obligatorio";
	if($_REQUEST['ap1'] == "")
		$error['ape1']="El campo Apellido 1 es obligatorio";
	if($_REQUEST['ap2'] == "")
		$error['ape2']="El campo Apellido 2 es obligatorio";
	if($_REQUEST['dir'] == "")
		$error['dir']="El campo Direccion es obligatorio";
	if($_REQUEST['cp'] == "")
		$error['cp']="El campo CP es obligatorio";
	
}

if(isset($_REQUEST['enviar'])){
	echo "hola1";
	validaPhp();
	cabecera();
	muestraForm();
}
else{
	cabecera();
	muestraForm();
}
?>
</BODY>
</html>

