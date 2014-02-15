<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Zapatillas Deporte</title>
<script src="funciones.js" type="text/javascript"></script>
<script>
  function Buscar(){ //Mia
	//Env�a los datos de un formulario de busqueda a la p�gina de resultados. Muestra el resultado en la capa llamada "Cont".
	var nombre = document.getElementById("NomProducto").value;
	var talla = document.getElementById("Talla").value;
	var marca = document.getElementById("Marca").value;
	var precio = document.getElementById("Precio").value;
		
	var ajax=creaAjax(); //Creamos el objeto Ajax
	
	var camposform = "nombre=" +nombre+"&talla="+talla+"&marca="+marca+"&precio="+precio; //creamos la cabecera con los parametros
	
	//Realizamos la llamada a la pagina PHP y obtenemos el resultdo
	obtenerDatosGet(ajax, "Buscador.php", "Cont", camposform);	
}

  function GuardaAviso(){ //Mia
	//Env�a los datos de un formulario de busqueda a la p�gina de resultados. Muestra el resultado en la capa llamada "Cont".
	var email = document.getElementById("Email").value;
	var parametros = "Email="+email;
	
	var ajax=creaAjax();	
	obtenerDatosGet(ajax, "GuardaAviso.php", "Cont", parametros);
}
</script>

</head>

<body>


<div id="buscador">
<form id="FBuscador">
  <p>Utiliza nuestro buscador para encontrar tus zapatillas de deporte.</p>
  <p>Nombre:
    <input type="text" id="NomProducto" /><br>
    N&uacute;mero: 
    <input type="text" id="Talla"/><br>
    Marca: 
    <select id="Marca" size="1">
      <option value="Nike">Nike</option>
      <option value="Adidas">Adidas</option>
      <option value="Asics">Asics</option>
    </select>
    <br />
    Precio: 
    <select id="Precio" size="1">
      <option value="50">Hasta 50 &euro;</option>
      <option value="100">Hasta 100&euro;</option>
      <option value="300">M&aacute;s de 100&euro;</option>
    </select>
    </p>
  <p>.
<input type="button" name="BtnBuscar" id="BtnBuscar" value="Buscar" onclick="javascript:Buscar()" />
    <br />
  </p>
</form>
</div>


<div id="Cont">

</div>



</body>
</html>