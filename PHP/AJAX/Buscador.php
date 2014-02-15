
<script>


</script>

<p>Vaya, ahora mismo no tenemos zapatillas <?=$_REQUEST['marca']." ".$_REQUEST['nombre']?> de la talla <?=$_REQUEST['talla']?> de ese precio.
Pero si quieres te avisamos cuando lleguen. D&eacute;janos tu e-mail y te enviaremos un correo cuando tengamos las zapatillas que buscas</p>
<form id="FGuardaAviso">
  <p>
    <label for="Email">Email</label>
    <input name="Email" type="text" id="Email" value="" size="45" />
  </p>
  <p>
    <input type="button" name="BtnEnviar" id="BtnEnviar" value="Av&iacute;same" onclick="javascript:GuardaAviso()" />
  </p>
</form>
<p>&nbsp;</p>
