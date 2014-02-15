
function creaAjax() { //Mia
	//Versión del libro de creación de objetos AJAX
	//También es genérica y puede ser utilizada en cualquier sitio
	var objxmlhttp = false;
	//Comprobamos el navegador del cliente
	if (window.XMLHttpRequest) {
		//El navegador es Firefox, Netescape, Safari o Chrome
		objxmlhttp = new XMLHttpRequest;
	} else if (window.ActiveXObject) {
		//El navegador es Internet Explorer
		objxmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	//Devolvemos el objeto AJAX recién creado
	return objxmlhttp;
}

function obtenerDatosGet(objetoAjax, pagina, nombrecapa, campos_formulario) { //Mia
	//Función que realiza la llamada a una página PHP del servidor utilizando AJAX
	if (objetoAjax) {
		//Hacemos referencia a la capa donde se va a mostrar el resultado
		var capadestino = document.getElementById(nombrecapa);
		//LLamamos a la pagina del servidor y enviamos los datos
		objetoAjax.open("GET", pagina + "?" + campos_formulario, true);
		
		//Esperamos a recibir la conestación del servidor
		//Comprobando el estado de readystate == 4 (Completo)
		//y status == 200 (Se ha cargado bien la cabecera HTML)
		objetoAjax.onreadystatechange=function() {
			if (objetoAjax.readyState == 4 && objetoAjax.status == 200) {
				//Se han recibido completamente los datos
				capadestino.innerHTML = objetoAjax.responseText;
			} else {
				//aquí podemos poner que cargue una imagen de espera
				capadestino.innerHTML="<div align='center'><img src='Cargando.gif' align='absmiddle'></div>";
			}	
		}
		objetoAjax.send(null);
	}
}

function Buscar(){ //Mia
	//Envía los datos de un formulario de busqueda a la p·gina de resultados. Muestra el resultado en la capa llamada "Cont".
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
	//EnvÌa los datos de un formulario de busqueda a la p·gina de resultados. Muestra el resultado en la capa llamada "Cont".
	var email = document.getElementById("Email").value;
	var parametros = "Email="+email;
	
	var ajax=creaAjax();	
	obtenerDatosGet(ajax, "GuardaAviso.php", "Cont", parametros);
}
