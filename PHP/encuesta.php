<html>
<head>
<title></title>
</head>
<body>
<form name="encuesta" method="get" action="verificar.php">
NOMBRE <input type="text" name="nombre" size="43"><br>
<br>
NIVEL DE INTERNET<br>
bajo <input type="radio" name="nivel" value="bajo" checked>
medio <input type="radio" name="nivel" value="medio">
alto <input type="radio" name="nivel" value="alto"><br>
<br>
EXPERIENCIA PREVIA EN PROGRAMACIÓN<br>
Visual Basic <input type="checkbox" name="basic">
C/C++ <input type="checkbox" name="c_cplus">
Java <input type="checkbox" name="java"><br>
<br>
TU OPINIÓN SOBRE ESTE CURSO<br>
<textarea name="opinion" cols="40" rows="5"></textarea><br>
<br>
<input type="submit" value="Enviar">
<input type="reset" value="Borrar todo">
</form>
</body>
</html>