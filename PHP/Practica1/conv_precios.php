<?php
    function pesetas_a_euros($pesetas){
		
		return number_format($pesetas/166.368,2);
	}

	function euros_a_pesetas($euros){
		
		return number_format($euros*166.368,2);
	}
?>