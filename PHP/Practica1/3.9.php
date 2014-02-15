<?php

	$total=0;
	
	$precio_kg=array("Judias" => 3.50,"Patatas" => 0.40, "Tomates" => 1.00, "Manzanas" =>1.20,"Uvas" => 2.50);
	
	$lista_compra=array("Judias" => 1.21,"Patatas" => 1.73, "Tomates" => 2.08, "Manzanas" =>2.15,"Uvas" => 0.77);
	
	echo "Producto-Precio/kg-Peso-Precio <br>";
	
	foreach ($precio_kg as $key => $value) {
		$precio=number_format(($value*$lista_compra[$key]),2);
		$total+=$precio;
		echo "$key - ".number_format($value,2)." - $lista_compra[$key] - $precio<br>";
	}
	echo "Total: $total euros <br> Gracias por su visita";
?>