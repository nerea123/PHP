<?php

	function pesetas_a_euros($pesetas){
		
		return number_format($pesetas/166.368,2);
	}

	function euros_a_pesetas($euros){
		
		return number_format($euros*166.368,2);
	}
	
	echo "Tiquet en pesetas <br><br>";
	
	$total=0;
	
	$precio_kg=array("Judias" => euros_a_pesetas(3.50),"Patatas" => euros_a_pesetas(0.40), "Tomates" => euros_a_pesetas(1.00), "Manzanas" =>euros_a_pesetas(1.20),"Uvas" => euros_a_pesetas(2.50));
	
	$lista_compra=array("Judias" => 1.21,"Patatas" => 1.73, "Tomates" => 2.08, "Manzanas" =>2.15,"Uvas" => 0.77);
	
	echo "Producto-Precio/kg-Peso-Precio <br>";
	
	foreach ($precio_kg as $key => $value) {
		$precio=number_format(($value*$lista_compra[$key]),2);
		$total+=$precio;
		echo "$key - ".number_format($value,2)." - $lista_compra[$key] - $precio<br>";
	}
	echo "Total: $total pesetas <br> Gracias por su visita<br><br>";
	
	echo "Tiquet en euros <br><br>";
	$total=0;
	
	
	echo "Producto-Precio/kg-Peso-Precio <br>";
	
	foreach ($precio_kg as $key => $value) {
		$precio=number_format((pesetas_a_euros($value)*$lista_compra[$key]),2);
		$total+=$precio;
		echo "$key - ".pesetas_a_euros($value)." - $lista_compra[$key] - $precio<br>";
	}
	echo "Total: $total euros <br> Gracias por su visita";
?>