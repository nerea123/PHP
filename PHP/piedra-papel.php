<html>
	<head>
		<body>
			<form action="piedra-papel.php" method="post">
			<input type="radio" name="ppt" value="piedra"/>Piedra
			<input type="radio" name="ppt" value="tijeras"/>Tijeras
			<input type="radio" name="ppt" value="papel"/>Papel"<br>
			<input type="submit" value="jugar" />
			
		</body>
	</head>
</html>
<?php


if(isset($_REQUEST['ppt']) ){
	$jugada=$_REQUEST['ppt'];
$makina= rand ( 0 , 2 );

$array[]="piedra";
$array[]="papel";
$array[]="tijeras";


$jugadaMakina=$array[$makina];

if($jugada == $jugadaMakina){
	echo "Empate";
}

else if($jugada == "tijeras" && $jugadaMakina == "papel"){ echo "Tu ganas";}
else if($jugada == "piedra" && $jugadaMakina == "tijeras"){ echo "Tu ganas";}
else if($jugada == "papel" && $jugadaMakina == "piedra"){ echo "Tu ganas";}
else { echo "Gana makina";}

echo" makina $jugadaMakina jugador $jugada";
    }
?>

