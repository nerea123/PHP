<?php
   include 'configuracion.php';
   
   $nombre="";
   $edad="";
   $comentario="";
   $errores=array();
   
   
	 
   
   function muestra_formulario(){
   		global $nombre;
		global $edad;
		global $comentario;
		global $errores;
		
		if (isset($_REQUEST["error_bd"])) {
        	echo "<center><font color='red'>Error al insertar la visita. Por favor intentelo de nuevo</font></center><br>";
      }
   		?>
   		
   		<form action="insertar.php" method="get">
   			<?php 
   			  echo idioma("general","nombre",$_SESSION['idioma']);
			  if(isset($errores['nombre'])) echo $errores['nombre']; ?><br>
   			<input type="text" id="nom" name="nom"  value="<?=$nombre?>"/><br>
   			
   			<?php 
   			echo idioma("general","edad",$_SESSION['idioma']);
   			if(isset($errores['edad'])) echo $errores['edad']; ?><br>
   			<input type="text" id="edad" name="edad"  value="<?=$edad?>"/><br>
   			
   			<?php
   			echo idioma("general","comentario",$_SESSION['idioma']);
   			 if(isset($errores['comentario'])) echo $errores['comentario']; ?><br>
   			<textarea cols="40" rows="5" name="comentario" id="comentario"><?=$comentario?></textarea><br>
   			<input name="enviar" type="submit" value="Enviar">
   		</form>
   		<?php
   }
   
   function validar(){
   		global $nombre;
		global $edad;
		global $comentario;
		global $errores;
		
	if(isset($_REQUEST['nom']))
   		$nombre=$_REQUEST['nom'];
   
    if(isset($_REQUEST['edad']))
   		$edad=$_REQUEST['edad'];
	
	 if(isset($_REQUEST['comentario']))
   		$comentario=$_REQUEST['comentario'];
	 
	  if(isset($_REQUEST['errores']))
   		$errores=unserialize(urldecode($_REQUEST['errores']));
   }
   if(isset($_REQUEST['enviar'])){
   		cabecera_html("Errores");
	   	validar();
  		 muestra_formulario();
 		 pie_html();
	
   }
   else {
   cabecera_html("Insertar");
   muestra_formulario();
   pie_html();
	   
   }
?>
