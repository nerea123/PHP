
	<?php 
	
	include 'configuracion.php';
	
	function muestra_form(){
		
	?>
	<script src="../validaciones/validar.js"></script>
	<script language="javascript">
	
	function llamada_form(campo){
		
		var pagina=document.getElementById("pagina").options[document.getElementById("pagina").selectedIndex].value;
		var texto=document.getElementById("texto").options[document.getElementById("texto").selectedIndex].value;
		var idioma=document.getElementById("idioma").options[document.getElementById("idioma").selectedIndex].value;
		
		
		if(campo == "pagina"){
			
			window.location.href = "actualiza_textos.php?pagina=" + pagina;
		}
		if(campo == "texto"){
			
			window.location.href = "actualiza_textos.php?pagina=" + pagina+"&texto="+texto;
		}
		
		if(campo == "idioma"){
			
			window.location.href = "actualiza_textos.php?pagina=" + pagina+"&texto="+texto+"&idioma="+idioma;
		}
		
		
		
		
	}
	function validar_formulario(){
        var pagina=document.getElementById("pagina").options[document.getElementById("pagina").selectedIndex].value;
		var texto=document.getElementById("texto").options[document.getElementById("texto").selectedIndex].value;
		var idioma=document.getElementById("idioma").options[document.getElementById("idioma").selectedIndex].value;
		var texto_idioma=document.getElementById("texto_idioma").value;
		
		
		var valida=true;
		
		if(pagina == "--"){
			alert("Debes seleccionar un formulario");
			valida=false;
		}
		else if(texto == "--"){
			alert("Debes seleccionar un texto");	
			valida=false;
		}
		else if(idioma == "--"){
			alert("Debes seleccionar un idioma");	
			valida=false;
		}else {
			var vacio=true;
			for(var i=0;i<texto_idioma.length;i++){
			
				if(texto_idioma[i] != " ")
					vacio=false;
			}
			if(vacio){
				alert("Debes escribir un texto");
				valida=false;
			}else{
				
				valida=comprueba_texto(texto_idioma,"El texto no puede ser numeros");
				
			}
		}
		
        return valida;
    }
	</script>
	
		<form  name="formulario" action="editar_textos.php" onsubmit="return validar_formulario();" method="get">
		<table border=0 align=center cellspacing="5">
	<caption align="center"><h1><?= idioma("actualiza_textos.php","titulo",$_SESSION['idioma'])?></h1></caption>
		<tr>
			<td><?php echo idioma("actualiza_textos.php","formulario",$_SESSION['idioma']) ?><select id="pagina" name="pagina" onchange='llamada_form("pagina");'>
				<option>--</option>
				<?php
				$con=@mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
                if (!$con || !mysql_select_db(DB_NAME, $con)) {
                //Error en la conexion con la BD
                    echo "<option value=\"ERROR\">Error en el acceso a la base de datos</option>";
                } else {
                	$sql="select distinct nombrePag from idiomas ";
					$res=mysql_query($sql);
					
					while ($linea=mysql_fetch_array($res)) {
						$selec="";
						if(isset($_REQUEST['pagina']) && $_REQUEST['pagina']==$linea['nombrePag'])
							 $selec="selected";
			
						echo "<option $selec>".$linea['nombrePag']."</option>";
					}
				}
				?>
			</select></td>
			<td><?php echo idioma("actualiza_textos.php","texto",$_SESSION['idioma']) ?><select id="texto" name="texto" onchange='llamada_form("texto");'>
				<option>--</option>
				<?php
				$con=@mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
                if (!$con || !mysql_select_db(DB_NAME, $con)) {
                //Error en la conexion con la BD
                    echo "<option value=\"ERROR\">Error en el acceso a la base de datos</option>";
                } else {
                	$sql="select distinct nombreTexto from idiomas where nombrePag='".$_REQUEST['pagina']."'" ;
					$res=mysql_query($sql);
					
					while ($linea=mysql_fetch_array($res)) {
						$selec="";
						if(isset($_REQUEST['texto']) && $_REQUEST['texto']==$linea['nombreTexto'])
							 $selec="selected";
			
						echo "<option $selec>".$linea['nombreTexto']."</option>";
					}
				}
				?>
			</select></td>
			<td><?php echo idioma("actualiza_textos.php","idioma",$_SESSION['idioma']) ?><select id="idioma" name="idioma" onchange='llamada_form("idioma");'>
				<option>--</option>
				<?php
				$con=@mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
                if (!$con || !mysql_select_db(DB_NAME, $con)) {
                //Error en la conexion con la BD
                    echo "<option value=\"ERROR\">Error en el acceso a la base de datos</option>";
                } else {
                	$sql="select distinct idioma from idiomas where nombrePag='".$_REQUEST['pagina']."' and nombreTexto='".$_REQUEST['texto']."'" ;
					$res=mysql_query($sql);
					
					while ($linea=mysql_fetch_array($res)) {
						$selec="";
						if(isset($_REQUEST['idioma']) && $_REQUEST['idioma']==$linea['idioma'])
							 $selec="selected";
			
						echo "<option $selec>".$linea['idioma']."</option>";
					}
				}
				?>
			</select></td>

		</tr>
		<tr>
			<td colspan="3">
				
				<textarea name="texto_idioma" id="texto_idioma" cols=40 rows=10><?php
					if(isset($_REQUEST['idioma'])){
							$con=@mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		                if (!$con || !mysql_select_db(DB_NAME, $con)) {
		                //Error en la conexion con la BD
		                    echo "<option value=\"ERROR\">Error en el acceso a la base de datos</option>";
		                } else {
		                	$sql="select textoFinal from idiomas where nombrePag='".$_REQUEST['pagina']."' and nombreTexto='".$_REQUEST['texto']."' and idioma='".$_REQUEST['idioma']."'" ;
							$res=mysql_query($sql);
							
							while ($linea=mysql_fetch_array($res)) {
	
								echo $linea['textoFinal'];
							}
						}
					} ?></textarea>
				 </td>
		</tr>
		<tr><td colspan=3>
            <div align="center">
                <br>
                <input name="Enviar" type="submit" value="<?=idioma("general", "enviar", $_SESSION['idioma'])?>">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="cancelar" type="button" value="<?=idioma("general", "cancel", $_SESSION['idioma'])?>" onclick="window.location.href = 'libro_visitas.php'" >
            </div>
            
        </td></tr>
	</table>
	</form>
	</body>
	<?php
	}

	function muestra_errores(){
		if(isset($_REQUEST['errores'])){
			
			$errores=unserialize(urldecode($_REQUEST['errores']));
			foreach ($errores as $key => $value) {
				
				echo $value."<br>";
			}
				
		}
		
		if(isset($_REQUEST['error_bd']))
			echo $_REQUEST['error_bd'];
	}
	cabecera_html("Modifica textos");
	muestra_form();
	muestra_errores();
	pie_html();
	?>


