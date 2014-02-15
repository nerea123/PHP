
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


