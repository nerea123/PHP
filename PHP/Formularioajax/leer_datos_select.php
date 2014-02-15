<?php
    include("./configuracion.php");
    $con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if (!$con || !mysql_select_db(DB_NAME, $con)) {
    //Error en la conexion con la BD
        echo "<option value=\"ERROR\">Error en el acceso a la base de datos</option>";
    } else {
        
        if (isset($_REQUEST["idioma_texto"])){                        
            $sql = "SELECT traduccion FROM texto_idioma WHERE pagina=\"{$_REQUEST["pagina"]}\" AND texto=\"{$_REQUEST["texto"]}\" AND idioma=\"{$_REQUEST["idioma_texto"]}\"";
            $res = mysql_query($sql);
            while ($linea = mysql_fetch_array($res)) {
                echo $linea["traduccion"];
            }
        } else if (isset($_REQUEST["texto"])){                        
            $sql = "SELECT distinct idioma FROM texto_idioma WHERE pagina=\"{$_REQUEST["pagina"]}\" AND texto=\"{$_REQUEST["texto"]}\"";
            $res = mysql_query($sql);
            echo "<option value=\"\">--</option>";
            while ($linea = mysql_fetch_array($res)) {
                $seleccionado = "";
                if (isset($_REQUEST["idioma_texto"])){
                    if ($_REQUEST["idioma_texto"]== $linea["idioma"])
                        $seleccionado = "selected";
                }
                echo "<option value=\"" . $linea["idioma"] . "\" $seleccionado >". $linea["idioma"] ."</option>";
            }
        } else if (isset($_REQUEST["pagina"])) {                        
            $sql = "SELECT distinct texto FROM texto_idioma WHERE pagina=\"". $_REQUEST["pagina"] . "\"";
            $res = mysql_query($sql);
            echo "<option value=\"\">--</option>";
            while ($linea = mysql_fetch_array($res)) {
                $seleccionado = "";
                if (isset($_REQUEST["texto"])){
                    if ($_REQUEST["texto"]== $linea["texto"])
                        $seleccionado = "selected";
                }
                echo "<option value=\"" . $linea["texto"] . "\" $seleccionado >". $linea["texto"] ."</option>";
            }
        } else {
            $sql = "SELECT distinct pagina FROM texto_idioma";
            $res = mysql_query($sql);
            echo "<option value=\"\">--</option>";
            while ($linea = mysql_fetch_array($res)) {
                $seleccionado = "";
                if (isset($_REQUEST["pagina"])){
                    if ($_REQUEST["pagina"]== $linea["pagina"])
                        $seleccionado = "selected";
                }
                echo "<option value=\"" . $linea["pagina"] . "\" $seleccionado >". $linea["pagina"] ."</option>";
            }
        }
    }
            
?>