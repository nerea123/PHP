<html>
	<head></head>
	<body></body>
	<form action="3.3.php" method="post">
		Introduce tu NIF<input type="text" name="nif" /><br>
		<input type="submit" value="Validar" />
		
	</form>
</html>
<?php
    
    if(isset($_REQUEST['nif'])){
    	$value=$_REQUEST['nif'];
    	$error=FALSE;
		
		if(strlen($value) <9|| strlen($value)>9){
			$error=TRUE;
		}
		echo "string";
		if(!$error){
		
			for($i=0;$i<strlen($value);$i++){
		
					if($i<(strlen($value)-1) && ord($value[$i])>=48 && ord($value[$i]) <=57){
						$error=FALSE;
						continue;
				}
				
				if($i == (strlen($value)-1) && ord($value[$i])>=65 && ord($value[$i]) <=90 || $i == (strlen($value)-1) && ord($value[$i])>=97 && ord($value[$i]) <=122){
					$error=FALSE;
					continue;
				}
				
				else {
					$error=TRUE;
					break;
				}
					
			}
		}
		
		if(!$error){
			echo "NIF valido <font color='blue'>".strtoupper($value)."</font>";
		}
		else 
			echo "NIF no valido <font color='red'>$value</font>";
    }
?>