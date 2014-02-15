<?php
   include 'configuracion.php';
   	
   function muestra_form(){
   	if(isset($_REQUEST['errores'])){
		$errores=unserialize(urldecode($_REQUEST['errores']));
	}
	if(isset($_REQUEST['formulario']))
		$form=$_REQUEST['formulario'];
	if(isset($_REQUEST['texto']))
		$texto=($_REQUEST['texto']);
	if(isset($_REQUEST['idioma']))
		$idioma=$_REQUEST['idioma'];
	if(isset($_REQUEST['result']))
		$result=$_REQUEST['result'];
	
	if(isset($_REQUEST['error_bd']))
		echo "Error al realizar la insercion";
	
	
?>

<script src="../validaciones/validar.js"></script>
<script>
function valida(){	

	var formulario=document.getElementById("formulario").value;
	var texto=document.getElementById("texto").value;
	var idioma=document.getElementById("idioma").value;
	var result=document.getElementById("result").value;
	var valida=true;

	if(vacio(formulario,"El campo formulario es obligatorio"))
		valida=false;
	else if (comprueba_texto(formulario,"El campo formulario debe ser texto"))
		valida=false;
	
	if(valida){
		if(vacio(texto,"El campo texto es obligatorio"))
		valida=false;
	else if (comprueba_texto(texto,"El campo texto debe ser texto"))
		valida=false;
	}	
	
	if(valida){
		if(vacio(idioma,"El campo idioma es obligatorio"))
		valida=false;
	else if (comprueba_texto(idioma,"El campo idioma debe ser texto"))
		valida=false;
	}
	
	if(result){
		if(vacio(result,"El campo texto final es obligatorio"))
		valida=false;
	else if (comprueba_texto(result,"El campo texto final debe ser texto"))
		valida=false;
	}
	
	return valida;
	
}
			
	
</script>
<form action="comprueba_textos.php" >
<table align="center" cellpadding="5">
	<caption><h2><?=idioma("introducir_textos.php","titulo",$_SESSION['idioma'])?></h2></caption>
	<tr>
		<td><?php 
		 echo idioma("introducir_textos.php","formulario",$_SESSION['idioma'])." ";
		 if(isset($errores['formulario'])) echo $errores['formulario'];
		 ?>
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="formulario" id="formulario" />
		</td>
	
	</tr>
	<tr>
		<td><?php 
		 echo idioma("introducir_textos.php","texto",$_SESSION['idioma'])." ";
		 if(isset($errores['texto'])) echo $errores['texto'];
		 ?>
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="texto" id="texto" />
		</td>
	
	</tr>
	<tr>
		<td><?php 
		 echo idioma("introducir_textos.php","idioma",$_SESSION['idioma'])." ";
		 if(isset($errores['idioma'])) echo $errores['idioma'];
		 ?>
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="idioma" id="idioma" size="5" />
		</td>
	
	</tr>
	<tr>
		<td><?php 
		 echo idioma("introducir_textos.php","result",$_SESSION['idioma'])." ";
		 if(isset($errores['result'])) echo $errores['result'];
		 ?>
		</td>
	</tr>
	<tr>
		<td>
			<input type="text" name="result" id="result" />
		</td>
	
	</tr>
	
	<tr>
		<td>
			<input type="submit" value="enviar" name="enviar" /> &nbsp;&nbsp;<input type="reset" value="Borrar" name="reset" />&nbsp;&nbsp;<input type="button" value="Cancelar" onclick="window.location.href = 'ver.php'"/>
		</td>
	</tr>
	
</table>
</form>
<?php
   }
   cabecera_html("Introducir textos");
   muestra_form();
   pie_html();
?>