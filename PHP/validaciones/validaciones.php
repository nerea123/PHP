<?php
    
    /*los números se
encuentran en las posiciones 48 a 57 y las letras en las
posiciones 65 a 90 (mayúsculas) y 97 a 122 (minúsculas)
	 * y el 32 es el espacio en blanco*/
    
    function valida_cadena_sin_espacios($cadena){
    	$valida=TRUE;
		for($i=0;$i<strlen($cadena);$i++){
			
			if(ord($cadena[$i]) <65 || ord($cadena[$i]) > 90 && ord($cadena[$i]) < 97 || ord($cadena[$i])>122){
				$valida=FALSE;
				break;
			}
		}
		
		return $valida;
    }
	
	function valida_cadena_con_espacios($cadena){
    	$valida=TRUE;
		for($i=0;$i<strlen($cadena);$i++){
			//echo $cadena[$i] ." ".ord($cadena[$i]."<br>");
			if(ord($cadena[$i])!=32 && (ord($cadena[$i]) <65 || ord($cadena[$i]) > 90 && ord($cadena[$i]) < 97 || ord($cadena[$i])>122)){
				
				$valida=FALSE;
				break;
			}
		}
		
		return $valida;
    }
	
	function valida_numeros($cadena){
		$valida=TRUE;
		for($i=0;$i<strlen($cadena);$i++){
			echo $cadena[$i] ." ".ord($cadena[$i])."<br>";
			if(ord($cadena[$i])<48 || ord($cadena[$i])>57){
				$valida=FALSE;
				break;
			}
		}
		return $valida;
	}
	

	function valida_dni($value){
		$valida=TRUE;
		if(strlen($value)<9 || strlen($value)>9)
			$valida=FALSE;
		
		if($valida){
			for($i=0;$i<strlen($value);$i++){
			
						if($i<(strlen($value)-1) && ord($value[$i])>=48 && ord($value[$i]) <=57){
							
							continue;
					}
					
					if($i == (strlen($value)-1) && ord($value[$i])>=65 && ord($value[$i]) <=90 || $i == (strlen($value)-1) && ord($value[$i])>=97 && ord($value[$i]) <=122){
						
						continue;
					}
					
					else {
						$valida=FALSE;
						break; 
					}
						
				}
		}
		
		return $valida;
	}
	
	 function comprobar_email($email){
 
		  $email = trim($email);
		  $arroba = false;
		  $punto = false;
		  $posicionArroba=0;
		  $subcadena="";
		  
		  if($posicionArroba=strpos($email, "@")){
		   $arroba = true;
		  }
		  
		  
		  $subcadena=substr($email, $posicionArroba);
		  
		 if(strpos($subcadena, ".")) {
		   $punto = true;
		  }
		  
		
		  
		  if($arroba && $punto){
		   return true;
		  }
		   return false;
		  
	 }
	 
	 function esta_vacio($cadena){
	 	if(strlen($cadena) == 0)
			return TRUE;
		return FALSE;
	 }
	 
	
	
	
?>