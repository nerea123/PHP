<?php
include("./configuracion.php");

function mostrar_formulario() {
    $idioma = $_SESSION["idioma"];
    $formulario = "";
    $texto = "";
    $idioma_texto = "";
    
    
?>
<script language="javascript">
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
        alert("ahora valida el formulario y edita el texto ;-)");
        return false;
    }
    
</script>

<table border=0 align=center cellspacing="5">
<tr>
    <td class="titulo" align="center"><?=leer_texto("formulario_idioma", "titulo1", $idioma)?></td>
</tr>
<tr>
    <td>
        <form  name="formulario" action="editar_texto.php" onsubmit="return validar_formulario();" method="get">
        <table align="center" border="0" bgcolor="#CCCCFF" bordercolor="#000066" cellpadding="5">
        <tr>
            <td>
            <br>
            <?=leer_texto("general", "pagina", $idioma)?> Formulario:
            <select name="pagina" id="pagina" onchange='llamada_form("pagina");'>
            <?php
                $con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
                if (!$con || !mysql_select_db(DB_NAME, $con)) {
                //Error en la conexion con la BD
                    echo "<option value=\"ERROR\">Error en el acceso a la base de datos</option>";
                } else {
                    echo "<option value=\"\">--</option>";
                    $sql = "SELECT distinct pagina FROM texto_idioma";
                    $res = mysql_query($sql);
                    while ($linea = mysql_fetch_array($res)) {
                        $seleccionado = "";
                        if (isset($_REQUEST["pagina"])){
                            if ($_REQUEST["pagina"]== $linea["pagina"])
                                $seleccionado = "selected";
                        }
			echo "<option value=\"" . $linea["pagina"] . "\" $seleccionado >". $linea["pagina"] ."</option>";
                    }
                }
            
?>
            </select>
            </td>
            <td>
            <br>
            <?=leer_texto("general", "texto", $idioma)?> Texto:
            <select name="texto" id="texto" onchange="llamada_form('texto');">
            <?php
                $con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
                if (!$con || !mysql_select_db(DB_NAME, $con)) {
                //Error en la conexion con la BD
                    echo "<option value=\"ERROR\">Error en el acceso a la base de datos</option>";
                } else {
                    echo "<option value=\"\">--</option>";
                    if (isset($_REQUEST["pagina"])){                        
                        $sql = "SELECT distinct texto FROM texto_idioma WHERE pagina=\"". $_REQUEST["pagina"] . "\"";
                        $res = mysql_query($sql);
                        while ($linea = mysql_fetch_array($res)) {
                            $seleccionado = "";
                            if (isset($_REQUEST["texto"])){
                                if ($_REQUEST["texto"]== $linea["texto"])
                                    $seleccionado = "selected";
                            }
                            echo "<option value=\"" . $linea["texto"] . "\" $seleccionado >". $linea["texto"] ."</option>";
                        }
                    }
                }
        ?>
            </select>
            </td><td>
            <br>
            <?=leer_texto("general", "idioma", $idioma)?>:
            <select name="idioma" id="idioma_texto" onchange="llamada_form('idioma_idioma_texto');">
            <?php
                $con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
                if (!$con || !mysql_select_db(DB_NAME, $con)) {
                //Error en la conexion con la BD
                    echo "<option value=\"ERROR\">Error en el acceso a la base de datos</option>";
                } else {
                    echo "<option value=\"\">--</option>";
                    if (isset($_REQUEST["texto"])){                        
                        $sql = "SELECT distinct idioma FROM texto_idioma WHERE pagina=\"{$_REQUEST["pagina"]}\" AND texto=\"{$_REQUEST["texto"]}\"";
                        $res = mysql_query($sql);
                        while ($linea = mysql_fetch_array($res)) {
                            $seleccionado = "";
                            if (isset($_REQUEST["idioma_texto"])){
                                if ($_REQUEST["idioma_texto"]== $linea["idioma"])
                                    $seleccionado = "selected";
                            }
                            echo "<option value=\"" . $linea["idioma"] . "\" $seleccionado >". $linea["idioma"] ."</option>";
                        }
                    }
                }
        ?>
        </select>
            </td>
        </tr>
        <tr>
            <td colspan=3 align="center">
                <textarea name="texto_idioma" id="texto_idioma" cols=40 rows=10>
            <?php
                $con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
                if (!$con || !mysql_select_db(DB_NAME, $con)) {
                //Error en la conexion con la BD
                    echo "Error en el acceso a la base de datos";
                } else {
                    if (isset($_REQUEST["idioma_texto"])){                        
                        $sql = "SELECT traduccion FROM texto_idioma WHERE pagina=\"{$_REQUEST["pagina"]}\" AND texto=\"{$_REQUEST["texto"]}\" AND idioma=\"{$_REQUEST["idioma_texto"]}\"";
                        $res = mysql_query($sql);
                        while ($linea = mysql_fetch_array($res)) {
                            echo $linea["traduccion"];
                        }
                    }
                }
                ?>
                </textarea></td>
        </tr>
        <tr><td colspan=3>
            <div align="center">
                <br>
                <input name="Enviar" type="submit" value="<?=leer_texto("general", "enviar", $idioma)?>">
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

if (isset($_REQUEST["idioma"])){
    $idioma = $_REQUEST["idioma"];
    $_SESSION["idioma"] = $_REQUEST["idioma"];
    header("location:libro_visitas.php");
    exit();
}
cabecera_html("Cambiar idioma");
mostrar_formulario();
pie_html();

?>