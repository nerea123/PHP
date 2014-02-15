<html>
<head>
</head>
<body>

<?php

define ('TAM',4);

function potencia ($n1,$n2){

	$res= pow($n1, $n2);
	return $res;

}

echo "<table border='1'>";
for($n1=1; $n1<=TAM; $n1++){
	echo "<tr>";
	for($n2=1;$n2<=TAM;$n2++){
		echo "<td>".potencia($n1,$n2)."</td>";
	}
	echo "</tr>";
}
echo "</table>"

?>

</body>
</html>
