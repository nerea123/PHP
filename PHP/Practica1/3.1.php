<?php
    
    function mostrar_impares($value)
    {
    	echo "<font color='red'> $value </font><br>" ;
        for($i=0;$i<strlen($value);$i++){
			if($i%2 != 0)
				echo "posicion $i = $value[$i] <br>";
		}
    }
  
	mostrar_impares("A quien madruga Dios le ayuda");
?>