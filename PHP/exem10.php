<html>

<body>

<?php

$nota = 5;

if( $nota >= 1 && $nota <= 10 )

if($nota < 5 ){

$color = "#AA0000"; // color del mensaje

$missatge = "No has superado la prueba.";

}

else{

$color = "#0000AA";

$missatge = "Prueba superada";

}

else{

$color = "#000000";

$missatge = "Error! la nota debe estar entre 1 y 10";

}

echo "<p style=\"color:$color\"> $missatge</br> Calificación: $nota </p>";

?>

</body>

</html>