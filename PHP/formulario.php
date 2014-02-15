<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nombre</title>
<script type="text/javascript">

function validar()
{
var nombre=document.getElementById("nombre");

if(nombre.value=="")
{
	alert("ATENCIÓN: Campo nombre vacío");
	nombre.focus();
	return false;
}
else
{
	if(!isNaN (nombre.value))
	{
		alert("ATENCIÓN: Campo nombre no puede contener números");
		nombre.focus();
		return false;
	}
	else
	{
		var apellidos=document.getElementById("apellidos");
		if(apellidos.value=="")
		{
			alert("ATENCIÓN: Campo apellidos vacío");
			apellidos.focus();
			return false;
		}
		else
		{
			if(!isNaN (apellidos.value))
			{
				alert("ATENCIÓN: Campo apellidos no puede contener números");
				apellidos.focus();
				return false;
			}
			else
			{
				var correo=document.getElementById("correo");
				var valor=correo.value;
				var patron=/^[a-z]+[_\.\-]{0,1}[a-z0-9]+@[a-z0-9]+[_\.\-]{0,1}[a-z0-9]+\.[a-z]{2,4}$/;
				if(correo.value=="")
				{
					alert("ATENCIÓN: Campo correo vacío");
					correo.focus();
					return false;
				}
				else
				{
					if(!valor.search(patron)==0)
					{
						alert("ATENCIÓN: Correo inválido");
						correo.focus();
						return false;
					}
					else
					{
						var poblacion=document.getElementById("poblacion");
						if(poblacion.value=="")
						{
							alert("ATENCIÓN: Campo poblacion vacío");
							poblacion.focus();
							return false;
						}
						else
						{
							if(!isNaN (poblacion.value))
							{
								alert("ATENCIÓN: Campo poblacion no puede contener números");
								poblacion.focus();
								return false;
							}
							else
							{
								var provincia=document.getElementById("provincia");
								if(provincia.value=="")
								{
									alert("ATENCIÓN: Campo provincia vacío");
									provincia.focus();
									return false;
								}
								else
								{
									if(!isNaN (provincia.value))
									{
										alert("ATENCIÓN: Campo poblacion no puede contener números");
										provincia.focus();
										return false;
									}
									else
									{
										var edad=document.getElementsByName("edad");
										var pulsado="";
										for(var i=0; i<edad.length; i++) 
										{    
										  if(edad[i].checked) 
										  {
										    pulsado=edad[i];
										  }
										  //else{return false;}
										}
										if(pulsado.length==0)
										{
											alert("Seleccione una edad");
											return false;
										}
										else 
										{
											var conocer=document.getElementsByName("conocer");
											var pulsado="";
											for(var i=0; i<conocer.length; i++) 
											{    
											  if(conocer[i].checked) 
											  {
											    pulsado=conocer[i];
											    break;
											  }
											}
											if(pulsado.length==0)
											{
												alert("Selecciona como nos conociste");
												return false;
											}
											else 
											{
												var frecuencia=document.getElementById("frecuencia").selectedIndex;
												if(frecuencia==-1) 
												{
												  alert("Selecciona la frecuencia con la que visitas internet");
												  return false;
												}
												else 
												{
													alert("¡Validación correcta con javascript!"); 
												}											
											}										
										}									
									}
								}							
							}
						}
					}						
				}	
			}	
		}			
	}
}


}
</script>

</head>

<body>
<?php
session_start();
$nombre=$_SESSION['nombre'];
$apellidos=$_SESSION['apellidos'];
$correo=$_SESSION['correo'];
$poblacion=$_SESSION['poblacion'];
$provincia=$_SESSION['provincia'];
$edad=$_SESSION['edad'];
$conocer=$_SESSION['conocer'];
$opinion=$_SESSION['opinion'];
$sugerencias=$_SESSION['sugerencias'];
$frecuencias=$_SESSION['frecuencias'];
$error=" ";//Para que no me salgan los errores cuando no estan definidos
if(isset ($_REQUEST['nombre'])) 
{
	$nombre=$_REQUEST['nombre'];
	if(!isNaN($nombre))
	{
		$error="El campo no debe contener numeros";
	}
	else $error=" ";
}
if(isset ($_REQUEST['apellidos'])) 
{
	$apellidos=$_REQUEST['apellidos'];
	if(!isNaN($apellidos))
	{
		$error="El campo no debe contener numeros";
	}
	else $error=" ";
}




?>

<form action="resolviendo.php" method="get" name="formulario">
Nombre: <input type="text" name="nombre" id="nombre" size="25" maxlength="50" value="<?=$error;?>"/><br/><br/>
Apellidos: <input type="text" name="apellidos" id="apellidos" size="35" maxlength="100" value="<?=$error;?>"/>
<br/><br/>
Correo electrónico: <input type="text" value="" name="correo" id="correo" size="40" maxlength="100"/>
<br/><br/>
Población: <input type="text" name="poblacion" id="poblacion" size="15" maxlength="50"/>
<br/><br/>
Provincia: <input type="text" name="provincia" id="provincia" size="15" maxlength="50"/>
<table width="100%" border="0" cellspacing="0" cellpadding="10">
<tr>
<td>Edad:
<br/>
<input type="radio" name="edad" value="020"/> 0-20
<br/>
<input type="radio" name="edad" value="2040"/> 20-40
<br/>
<input type="radio" name="edad" value="4060"/> 40-60
<br/>
<input type="radio" name="edad" value="60100"/> 60-100</td>
<td>&iquest;C&oacute;mo nos conociste?<br/>
<input type="checkbox" name="conocer"/>
A trav&eacute;s de un amigo.<br/>
<input type="checkbox" name="conocer"/>
A trav&eacute;s de un buscador.<br/>
<input type="checkbox" name="conocer"/>
Navegando por la red.<br/>
<input type="checkbox" name="conocer"/>
Otros</td>
</tr>
</table>
Opinión sobre nuestra p&aacute;gina web<br/>
<textarea cols="40" rows="5" name="opinion">Escriba aquí su opinión...</textarea>
<br/><br/>
Tiene alguna sugerencia...
<br/>
<textarea cols="40" rows="5" name="sugerencias">Escriba aquí sus sugerencias...</textarea>
<br/><br/>
&iquest;C&uacute;anto navegas por intenet? (Se&ntilde;ala la opci&oacute;n que
m&aacute;s se acerque)<br/>
<select name="frecuencia" id="frecuencia" size="2">
<option value="1">2 horas al día.</option>
<option value="2">4 horas al día.</option>
<option value="3">10 horas a la semana.</option>
<option value="4">20 horas al mes.</option>
</select>
<br/>
<br/>
<table width="50%" border="0" align="center" cellpadding="10" cellspacing="0">
<tr>
<td><div align="center">
<input type="submit" value="Enviar formulario" onclick="return validar();"/>
</div></td>
<td><div align="center">
<input type="Reset" value="Borrar formulario"/>
</div></td>
</tr>
</table>
</form>
<?php
?>
</body>

</html>
