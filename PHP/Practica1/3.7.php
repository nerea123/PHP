<?php

if(isset($_REQUEST['sep']) && isset($_REQUEST['text'])){
	
	function codifica($cadena,$desplaza){
		
		define('DESPLAZAMIENTO', $desplaza);
		
		
	     $letras=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	
		$cadena=strtolower($cadena);
		
		echo "FRASE : <font color='blue'>$cadena</font><br>Separador: <font color='green'>$desplaza</font> <br>";
		for($i=0;$i<strlen($cadena);$i++){
			for($e=0;$e<sizeof($letras);$e++){
				if($cadena[$i] == $letras[$e]){
					
					if($e +DESPLAZAMIENTO > sizeof($letras)-1){
						$aux=$e +DESPLAZAMIENTO-sizeof($letras);
						$cadena[$i]=$letras[$aux];
						break;
					}
					else {
						$cadena[$i]=$letras[$e+DESPLAZAMIENTO];
						break;
					}
				}
			}
		}
		echo "FRASE CODIFICADA: <font color='red'>$cadena</font>";
	}
	
	codifica($_REQUEST['text'],$_REQUEST['sep']);
}
?>
<html>
	<head>
		
	<script>
			function validar(){
				var sep=document.getElementById("sep");
				var text=document.getElementById("text");
				
				if(text.value == "" || !isNaN(text.value))
					alert("Introduce una frase")
				else if(sep.value == "" || isNaN(sep.value))
					alert("Introduce un numero como separador");
				else if(sep.value.indexOf(" ")!= -1)
					alert("No puede haber espacion en el separador");
				else if(sep.value == 0 || sep.value >= 26)	
					alert("El separador debe de estar entre 1 y 25");
				else
					document.getElementById("form").submit();	
			}
		</script>
	</head>
		<body>
			<h1>Codifica</h1>
			<form action="3.7.php" method="post" id="form">
				Introduce una frase<input type="text" name="text" id="text" /><br>
				Introduce el numero de separador<input type="text" name="sep" id="sep" /><br>
				<input type="button" value="Codifica" onclick="validar();"/>
				 </form>
		</body>
		<form>
			
		</form>
	</body>
</html>