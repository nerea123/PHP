<html>

<body>

<?php

function creaTabla(){

for($i=1; $i<=50; $i++){

	echo"<tr><td>$i</td> ";
	if($i%2 == 0)
		echo"<td>Par</td> ";
	else
		echo"<td>Impar</td> ";
	if($i%3 ==0)
		echo"<td>Es divisible</td>";
	else
		echo"<td>No es divisible</td></tr> ";
	}

}

$grup="C";

echo "<Table border='1'>
	<tr>
		<th>Numero</th>\n
		<th>Par/Impar</th>\n
		<th>Divisible por tres</th>\n
	<tr>";

creaTabla();

echo "</table>";



?>

</html>

</body>