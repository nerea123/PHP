<?php
crear_cabe();

$ganadas = 0;
$empates = 0;
$perdidas = 0;
$texto="";	
if(isset($_REQUEST['ganadas'])){
	$ganadas=$_REQUEST['ganadas'];
}
if(isset($_REQUEST["empates"])){
	$empates=$_REQUEST["empates"];
}
if(isset($_REQUEST["perdidas"])){
	$perdidas=$_REQUEST["perdidas"];
}

	function crear_formulario(){
		global $ganadas;
		global $perdidas;
		global $empates;
		global $texto;
	?>
				<form action="3.16.php" method="get">
					<input type="radio" name="ppt" value="piedra"/>Piedra
					<input type="radio" name="ppt" value="tijeras"/>Tijeras
					<input type="radio" name="ppt" value="papel"/>Papel"<br>
					<input type="submit" value="jugar" name="enviar" />					
					<input type="hidden" name="ganadas" value="<?= $ganadas ?>" />
					<input type="hidden" name="empates" value="<?= $empates ?>" />
					<input type="hidden" name="perdidas" value="<?= $perdidas ?>" />
					
				</form>	
				<?php echo "$texto"; ?>				
			</body>
		</head>
	</html>
	<?php
		}
	?>
<?php

function principal(){
			
			global $ganadas;
			global $empates;
			global $perdidas;
			global $texto;
			
			$texto="";
			
			 if(isset($_REQUEST['ppt']) ){
				 $jugada=$_REQUEST['ppt'];
				 $makina= rand ( 0 , 2 );
				 
				 $array[]="piedra";
				 $array[]="papel";
				 $array[]="tijeras";
				 $jugadaMakina=$array[$makina];
				
			
				 if($jugada == $jugadaMakina){
				 	$texto.="Empate<br>";
					$empates=$empates+1;
			 }
			 
			 else if($jugada == "tijeras" && $jugadaMakina == "papel"){ $texto.="Tu ganas<br>";$ganadas=$ganadas+1;}
			 else if($jugada == "piedra" && $jugadaMakina == "tijeras"){ $texto.="Tu ganas<br>";$ganadas=$ganadas+1;}
			 else if($jugada == "papel" && $jugadaMakina == "piedra"){ $texto.= "Tu ganas<br>";$ganadas=$ganadas+1;}
			 else { $texto.= "Gana makina<br>";$perdidas=$perdidas+1;}
			 
			 
			 $texto.=" Jugada makina: $jugadaMakina<br> Jugada jugador: $jugada <br> ";
			 $texto.= "Ganadas: $ganadas  Perdidas: $perdidas  Empates: $empates";
			
			 }
			 
	}

	//Comprobar si es la primera vez
	if(isset($_REQUEST["enviar"])){
	
		principal();
		crear_formulario();
		
			
		
	
	
	}else{
		//lo qe aremos si no existe
		crear_formulario();		
	}
	
	function crear_cabe(){
		echo "
		<html>
			<head>
				<body>";
	}
	

?>