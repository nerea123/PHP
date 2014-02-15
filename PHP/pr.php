<?php
  $nombre="";
  $edad="";
  $errores_formulario; 
  
  if(isset($_REQUEST['errores'])){
  	$errores_formulario=unserialize(urldecode($_REQUEST['errores']));
	 
  }
  
  
  if(isset($_REQUEST['nom']))
  		$nombre=$_REQUEST['nom'];
  if(isset($_REQUEST['edad']))
 	 $edad=$_REQUEST['edad'];
  
  function mostrarFormulario(){
  	global $nombre;
	global $edad;
	global $errores_formulario;
	
?>
<html>
	<head></head>
	<body>
		<form action="validapr.php" method="post">
			
			Nombre
			<?php
			if(isset($errores_formulario['nombre']))
				echo $errores_formulario['nombre'];
			else {
				echo "Todo bien";
				
			}
			?>
			<br><input type="text" name="nom" value="<?=$nombre?>"/><br>
			Edad
			<?php
			if(isset($errores_formulario['edad']))
				echo $errores_formulario['edad'];
			else {
				echo "Todo bien";
			}
			?>
			<br><input type="text" name="edad" value="<?=$edad?>"/><br>
			<input type="submit" name="enviar" value="enviar"/>
		
		</form>
		
	</body>
</html>
<?php
  }
  
  function valida(){
  	global $errores_formulario;
  	if($_REQUEST['nom']== ""){
		$errores_formulario["nombre"]="El campo nombre es obligatorio";
		?>
		<script>
			alert("El nombre es obligatorio");
		</script>
		<?php
		echo "hola";
	}
	if($_REQUEST['edad']== "")
		$errores_formulario["edad"]="El campo edad es obligatorio";
  }
  
  if(isset($_REQUEST['enviar'])){
  	valida();
  	mostrarFormulario();
  }
  else{
  	mostrarFormulario();
  }
  ?>