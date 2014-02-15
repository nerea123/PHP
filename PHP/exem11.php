<html>

<head>

<title>exp1 ? exp2 : exp3; </title>

</head>

<body>

<?php

$num1 = 15;

$num2 = 8;

$num3 = 11;

$mesgran = ($num1>$num2) ? $num1 : $num2;

$mesgran = ($mesgran>$num3) ? $mesgran : $num3;

echo "<h3>Valores: $num1, $num2, $num3</h3>";

echo "<h3>Máximo: $mesgran</h3>";

?>

</body>

</html>