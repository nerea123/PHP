<?php
if(isset($_REQUEST['text'])){
	function codifica($cadena){
	    $letras=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	
		$cadena=strtolower($cadena);	
		echo "FRASE:<font color='blue'> $cadena </font><br>";
		for($i=0;$i<strlen($cadena);$i++){
			for($e=0;$e<sizeof($letras);$e++){
				if($cadena[$i] == $letras[$e]){
					
					if($cadena[$i] == 'z')
						$cadena[$i]='a';
					else {
						$cadena[$i]=$letras[$e+1];
						break;
					}
				}
			}
		}
		echo "FRASE CODIFICADA: <font color='red'>$cadena</font>";
	}
	
	codifica($_REQUEST['text']);
}
?>

<html>
	<head>
		
	<script>
			function validar(){
				
				var text=document.getElementById("text");
				
				if(text.value == "" || !isNaN(text.value))
					alert("Introduce una frase");
				else
					document.getElementById("form").submit();	
			}
		</script>
	</head>
		<body>
			<h1>Codifica</h1>
			<form action="3.6.php" method="post" id="form">
				Introduce una frase<input type="text" name="text" id="text" /><br>
				<input type="button" value="Codifica" onclick="validar();"/>
				 </form>
		</body>
		<form>
			
		</form>
	</body>
</html>