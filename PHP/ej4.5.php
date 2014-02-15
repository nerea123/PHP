<html>
<head>
</head>
<body>

<?php

define ('TAM',10);

echo "<table border='1'>";
$cont=1;

for($n1=0; $n1<TAM; $n1++){
	if( $n1 % 2 == 0)
		echo "<tr>";
	else
		echo "<tr bgcolor='red'>";
	for ($n2=0; $n2<TAM; $n2++){
		echo "<td> $cont </td>";
		$cont++;
	
	}
	echo "</tr>";

}

echo "</table>";

?>

</body>