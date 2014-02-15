<?php
include 'configuracion.php';
cabecera_html("");
?>
<table border=0 align=center cellspacing="5" height="80%">
<tr><td class="titulo" align="center">
	<?php echo idioma("ver.php","titulo",$_SESSION['idioma']); ?>
</td></tr>

<tr><td>
	
<?php
    
	$filasTotal="";
	$con=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	if(!$con || !mysql_select_db(DB_NAME,$con))
		echo "<h3 align=\"center\"> Error en el acceso a la base de datos. Error : \" " . mysql_error() . "\"</h2>";
	else {
		//obtenemos el total de registros
		$filasTotal=mysql_num_rows(mysql_query("select * from libro_visitas "));
		//ponemos el nº de pagina a 1 y si hemos pasado de pagina obtenemos la pagina en la que estamos y se lo asignamos
		$pagina=1;
		if(isset($_REQUEST['pagina'])){
			$pagina=$_REQUEST['pagina'];
		}
		//obtenemos el maximo numero de registros de esa pagina y el minimo
		$max=$pagina*VISITA_PAGINA;
		$min=$max-VISITA_PAGINA;
		//echo $min." ".$max;
		//mostramos a partir del minimo hasta el numero dicho en visitapagina
		$sql="select * from libro_visitas LIMIT $min,".VISITA_PAGINA;
		$res=mysql_query($sql);
		$filas = mysql_num_rows($res);
	
	if ($filas != 0) {
		while ($linea = mysql_fetch_array($res)) {
			echo "<table  border=\"1\"";
			echo "bgcolor=\"gray\" cellpadding=\"5\" cellspaccing=\"3\">";
			echo "<tr><th>".idioma("general","nombre",$_SESSION['idioma'])."</th><td>{$linea['nombre']}</td>";
			echo "<tr><th>".idioma("general","edad",$_SESSION['idioma'])."</th><td>{$linea['edad']} a&ntilde;os</td>";
			echo "<tr><th>".idioma("general","comentario",$_SESSION['idioma'])."</th><td>{$linea['comentario']}</td>";
			echo "<tr><th>".idioma("general","eliminar",$_SESSION['idioma'])."</th><td><a href=\"eliminar.php?visita={$linea['id']}\">".idioma("general","eliminar",$_SESSION['idioma'])."</a></td>";
			echo "<tr><th>".idioma("general","modificar",$_SESSION['idioma'])."</th><td><a href=\"modificar.php?visita={$linea['id']} \">".idioma("general","modificar",$_SESSION['idioma'])."</a></td>";
			
			echo "</table><br>";
		}
	}
	else {
		echo "<h1>El libro no tiene visitas</h1>";
	}
	}
?>
</td></tr>
<tr><td width="50%" align="right"><?php 
//si la pagina es mayor que 1 mostramos el enlace anterior
if($pagina > 1){
	$paginaAnt=$pagina-1;
	
 echo "<a href=\"ver.php?pagina=$paginaAnt\">".idioma("general","anterior",$_SESSION['idioma'])."</a>";
 } ?></td>
	<td width="50%" align="left">
		<?php
//si el total de registros es mayor que el numero maximo de regstros de la pagina actual mostramos el enlace siuiente		
if($filasTotal > $max){
	$pagina=$pagina+1;
 echo "<a href=\"ver.php?pagina=$pagina\">".idioma("general","siguiente",$_SESSION['idioma'])."</a>";
 } ?>
	</td>
</tr>
<tr><td align="right">
	<?php
	//obtenemos el numero de paginas que habra diviendo el total de registros entre los registros por pagina que mostraremos
	$aux=$filasTotal/VISITA_PAGINA;
	//redondeamos por si diera decimal
	//$aux=number_format($aux,0);
	if($filasTotal%VISITA_PAGINA>0)
		$aux=$aux+1;
	
	for($i=1;$i<=$aux;$i++)
		echo "<a href=\"ver.php?pagina=$i\">$i</a>"."  ";
	
 ?></td></tr>
</table>
<br>
<p align="right">
	<a href="insertar.php"><?php echo idioma("general","introducir",$_SESSION['idioma']); ?></a>
</p>
</body>
</html>