<?php
   function codifica($cadena,$desplazamiento){
		
		
		
		
	    $letras=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	
		$cadena=strtolower($cadena);
		
		for($i=0;$i<strlen($cadena);$i++){
			for($e=0;$e<sizeof($letras);$e++){
				if($cadena[$i] == $letras[$e]){
					
					if($e +$desplazamiento > sizeof($letras)-1){
						$aux=$e +$desplazamiento-sizeof($letras);
						$cadena[$i]=$letras[$aux];
					}
					else {
						$cadena[$i]=$letras[$e+$desplazamiento];
						break;
					}
				}
			}
		}
		return $cadena;
	}
   
   
   function decodifica($cadena,$desplazamiento){
	
	    $letras=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	
		$cadena=strtolower($cadena);
		
		for($i=0;$i<strlen($cadena);$i++){
			$hapasado=FALSE;
			for($e=0;$e<sizeof($letras)  && !$hapasado;$e++){
				if(($cadena[$i] == $letras[$e]) && ($e -$desplazamiento < 0)) {
					
					
						$aux=(0-$e)+$desplazamiento;
						$cadena[$i]=$letras[(sizeof($letras)-$aux)];
						$hapasado=TRUE;
					}
				else if($cadena[$i] == $letras[$e] )  {
						$cadena[$i]=$letras[$e-$desplazamiento];
						break;
					}
				
			}
		}
		
		return $cadena;
	}
?>