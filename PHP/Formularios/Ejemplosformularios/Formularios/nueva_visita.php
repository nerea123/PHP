<html>
<head>
	<title>Pr&aacute;ctica 3_2.</title>
</head>
<body>
<br>
<h3 align=center>FORMULARIO ORIGINAL <BR>Se env&iacute;a el formulario con get y no se muestran los errores.</h3>
<br>

<table align="center" border="1" bgcolor="#CCCCFF" bordercolor="#000066" cellpadding="5">
<tr><td>
<form  name="formulario"  action="insertar_visita.php" method="get">
<p align="center">
<b>DATOS PARA INCLUIR EN EL LIBRO</b>
</p>
NOMBRE:<br>
<input name="Nombre" type="text" size="25" maxlength="25" value="">
<br>
EDAD:
<br>
<input name="Edad" type="text"  size="5" maxlength="5" value="">
<br>
COMENTARIO:
<br>
<textarea cols="40" rows="10" name="Comentario"></textarea>
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