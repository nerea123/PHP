<?php
include("./configuracion.php");

function mostrar_formulario() {
    $idioma = $_SESSION["idioma"];
    $formulario = "";
    $texto = "";
    $idioma_texto = "";
    
    
?>
<script src="funciones.js" type="text/javascript"></script>
<script language="javascript">
    function llamada_form_ajax(campo){
        
        var pagina = document.getElementById("pagina").options[document.getElementById("pagina").selectedIndex].value;
        var texto =  document.getElementById("texto").options[document.getElementById("texto").selectedIndex].value;
        var idioma_texto =  document.getElementById("idioma_texto").options[document.getElementById("idioma_texto").selectedIndex].value;
        var camposform = "";
        var destino = "pagina"; //Por defecto se carga el select idioma
        
        if (campo == "pagina"){
            //el select que ha cambiado es el de pagina
            camposform = "pagina=" + pagina;
            destino = "texto";
            document.getElementById("texto").innerHTML = "<option value=\"\">--</option>";
            document.getElementById("idioma_texto").innerHTML = "<option value=\"\">--</option>";
            document.getElementById("texto_idioma").innerHTML = "";
            
        } else if (campo == "texto") {
            //el select que ha cambiado es el de texto
            camposform = "pagina=" + pagina + "&texto=" + texto;
            destino = "idioma_texto";
            document.getElementById("idioma_texto").innerHTML = "<option value=\"\">--</option>";
            document.getElementById("texto_idioma").innerHTML = "";
            
        } else if (campo == "idioma") {
            //el select que ha cambiado es el de idioma
            camposform = "pagina=" + pagina + "&texto=" + texto + "&idioma_texto=" + idioma_texto;
            destino = "texto_idioma";
        }
        
        var ajax=creaAjax(); //Creamos el objeto Ajax
	//Realizamos la llamada a la pagina PHP y obtenemos el resultdo
	obtenerDatosGet(ajax, "leer_datos_select.php", destino, camposform);
    }
    
    function llamada_form(campo){
        var pagina = document.getElementById("pagina").options[document.getElementById("pagina").selectedIndex].value;
        var texto =  document.getElementById("texto").options[document.getElementById("texto").selectedIndex].value;
        var idioma_texto =  document.getElementById("idioma_texto").options[document.getElementById("idioma_texto").selectedIndex].value;
        
        if (campo == "pagina"){
            //code
            window.location.href = "actualiza_textos.php?pagina=" + pagina;
            
        } else if (campo == "texto") {
            //code
            window.location.href = "actualiza_textos.php?pagina=" + pagina + "&texto=" + texto;
            
        } else {
            window.location.href = "actualiza_textos.php?pagina=" + pagina + "&texto=" + texto + "&idioma_texto=" + idioma_texto;    
        }
    }
    
    function validar_formulario(){
        var pagina = document.getElementById("pagina").options[document.getElementById("pagina").selectedIndex].value;
        var texto =  document.getElementById("texto").options[document.getElementById("texto").selectedIndex].value;
        var idioma_texto =  document.getElementById("idioma_texto").options[document.getElementById("idioma_texto").selectedIndex].value;
        var traduccion = document.getElementById("texto_idioma").value;
        
        if (pagina == "" || texto == "" || idioma_texto == "" || traduccion == "") {
            alert ("Debes rellenar todos los campos");
        }
        return false;
    }
    
    window.onload = llamada_form_ajax;
    
</script>

<table border=0 align=center cellspacing="5">
<tr>
    <td class="titulo" align="center">EDITAR TEXTOS DE LA PAGINA</td>
</tr>
<tr>
    <td>
        <form  name="formulario" action="editar_texto.php" onsubmit="return validar_formulario();" method="get">
        <table align="center" border="0" bgcolor="#CCCCFF" bordercolor="#000066" cellpadding="5">
        <tr>
            <td>
            <br>
             Formulario:
            <select name="pagina" id="pagina" onchange='llamada_form_ajax("pagina");'>
                <option value=\"\">--</option>
            </select>
            </td>
            <td>
            <br>
             Texto:
            <select name="texto" id="texto" onchange="llamada_form_ajax('texto');">
                <option value=\"\">--</option>
            </select>
            </td><td>
            <br>
            Idioma:
            <select name="idioma" id="idioma_texto" onchange="llamada_form_ajax('idioma');">
                <option value=\"\">--</option>
            </select>
            </td>
        </tr>
        <tr>
            <td colspan=3 align="center">
                <textarea name="texto_idioma" id="texto_idioma" cols=40 rows=10></textarea>
            </td>
        </tr>
        <tr><td colspan=3>
            <div align="center">
                <br>
                <input name="Enviar" type="submit" value="<?=leer_texto("general", "enviar", $idioma)?>" >
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="cancelar" type="button" value="<?=leer_texto("general", "cancelar", $idioma)?>" onclick="window.location.href = 'libro_visitas.php'" >
           </div>            
        </td></tr>
        </table>
    </td>
</tr>
</table>
</form>
<?php
}//Fin funcion mostrar_formulario

cabecera_html("Editar Textos");
mostrar_formulario();
pie_html();

?>