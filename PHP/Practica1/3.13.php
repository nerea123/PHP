<?php
   include 'cripto.php';
   
   if(isset($_REQUEST['sep'])){
   		
	
		$sep=$_REQUEST['sep'];
   
	   echo "Desplazamiento de $sep<br><br>";
	   $ciudades=array("madrid","valencia","barcelona","alicante","castellon");
	   $codCiudades;
	   $decodCiudades;
	   
	   foreach($ciudades as $ciudad){
	   		$codCiudades[]=codifica($ciudad,$sep);
	   }
	   
	   foreach($codCiudades as $ciudad){
	   		$decodCiudades[]=decodifica($ciudad,$sep);
	   }
	   
	   for($i=0;$i<sizeof($ciudades);$i++){
	   		echo "Ciudad :<font color='red'>$ciudades[$i] </font> Ciudad codificada:  <font color='blue'>$codCiudades[$i] </font> Ciudad decodificada: <font color='green'>$decodCiudades[$i]</font><br><br>";
		   
	   }
   }
?>
<html>
	<head>
		<script>
			function validar(){
				var sep=document.getElementById("sep");
				
				if(sep.value == "" || isNaN(sep.value))
					alert("Introduce un numero como separador");
				else if(sep.value == 0 || sep.value >= 26)	
					alert("El separador debe de estar entre 1 y 25");
				else
					document.getElementById("form").submit();	
			}
		</script>
	</head>
		<body>
			<form action="3.13.php" method="post" id="form">
				Introduce el numero de separador<input type="text" name="sep" id="sep" /><br>
				<input type="button" value="Ver ciudades codificadas" onclick="validar();"/>
				 </form>
		</body>
	
</html>