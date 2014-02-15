<?php
	
	include 'cripto.php';

    $frase=$_REQUEST['frase'];
	$sep=$_REQUEST['sep'];
	
	echo "<h1> Frase codificada <font color='blue'>".codifica($frase,$sep)."</font></h1>";
?>