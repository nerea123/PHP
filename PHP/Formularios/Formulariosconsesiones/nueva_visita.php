<?php
//Declaramos las variables de la p‡gina
$nombre = "";
$edad = "";
$comentario = "";
$error_edad = "";
$error_nombre = "";
$error_comentario = "";

//recuperamos los valores del formulario (en el caso que existan)
//los metemos en variables para inlcuirlos en los campos del formulario
session_start();
if (isset($_SESSION["nombre"]))
    $nombre = $_SESSION["nombre"];	
if (isset($_SESSION["edad"]))
    $edad = $_SESSION["edad"];
if (isset($_SESSION["comentario"]))
    $comentario = $_SESSION["comentario"];
    
//recuperamos los errores del formulario (en el caso que existan)
//los metemos en variables para inlcuirlos en los campos del formulario
if (isset($_SESSION["error_nombre"]))
    $error_nombre = "<font color='red'>El campo Nombre es obligatorio</font>";	
if (isset($_SESSION["error_edad"]))
    $error_edad = "<font color='red'>El campo Edad es obligatorio</font>";
if (isset($_SESSION["error_comentario"]))
    $error_comentario = "<font color='red'>El campo Comentario es obligatorio</font>";
?>

<html>
<head>
	<title>Pr&aacute;ctica 3_2.</title>
</head>
<body>
<br>
<h3 align=center>FORMULARIO CON SESIONES <BR>Se env&iacute;a el formulario con POST. Insertar_visita valida y almacena los datos</h3>
<br>

<table align="center" border="1" bgcolor="#CCCCFF" bordercolor="#000066" cellpadding="5">
<tr><td>
<form  name="formulario"  action="insertar_visita.php" method="post">
<p align="center">
<b>DATOS PARA INCLUIR EN EL LIBRO</b>
</p>
NOMBRE:<?=$error_nombre?><br>
<input name="Nombre" type="text" size="25" maxlength="25" value="<?=$nombre?>">
<br>
EDAD:<?=$error_edad?>
<br>
<input name="Edad" type="text"  size="5" maxlength="5" value="<?=$edad?>">
<br>
COMENTARIO:<?=$error_comentario?>
<br>
<textarea cols="40" rows="10" name="Comentario"><?=$comentario?></textarea>
<br>
<div align="center">
	<input name="" type="reset" value="Borrar">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input name="" type="submit" value="Enviar">
</div>
</form>
</td></tr></table>
</body>
</html>