/**
 * @author Nerea
 */

function comprueba_texto(campo,texto){
	if(!isNaN(campo)){
		alert(texto);
		return false;
	}
	
	return true;
}

function vacio(campo,texto){
	
	if(campo.length == 0){
		alert(texto);
		return true;
	}
	
	return false;
}

function comprueba_espacios(campo,texto){
	for(var i=0;i<campo;i++){
				if(campo[i] != " ")
					return false;
			}
	alert(texto);		
	return true;
}

function comprueba_numero(campo,texto){
	if(isNaN(campo)){
		alert(texto);
		return false;
	}else if(num1.indexOf(" ")!=-1 && num1.indexOf(" ")!=num1.length-1 ){
		alert("Error, encontrados varios espacios en blanco en un campo numerico");
		return false;
	}
	
	return true;
}

function valida_radio(campo,texto){
	var pulsado=0;
	for(var i=0; i<campo.length; i++ ){
		if(campo[i].checked)
			pulsado=campo[i];
		}
	
	if(pulsado == 0){
		alert(texto);
		return false;
	}
	return true;		
	
}
