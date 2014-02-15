<?php

function mostrar_formulario() {
    //el codigo HTML solo se inserta en la pagina si se ejecuta esta funcion
    global $errores_formulario;
    global $edad;
    global $nombre;
    global $comentario;
    global $id;
    $idioma = $_SESSION["idioma"];
?>
<h3><CENTER><?=leer_texto("form_editar_visita", "titulo1", $idioma)?> <BR></CENTER></h3>
  <form  name="formulario" action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
  <input type="hidden" name="visita" value="<?=$id?>">
  <table align="center" border="1" bgcolor="#CCCCFF" bordercolor="#000066" cellpadding="5">
  <tr><td>
  <p align="center">
  <b><?=leer_texto("form_editar_visita", "titulo2", $idioma)?></b>
  </p>
  <?=leer_texto("general", "nombre", $idioma)?>:<br>
  <input name="Nombre" type="text" size="25" maxlength="25" value="<?=$nombre?>">
  <br>
  <?=leer_texto("general", "edad", $idioma)?>:
  <br>
  <input name="Edad" type="text"  size="5" maxlength="5" value="<?=$edad?>">
  <br>
  <?=leer_texto("general", "comentario", $idioma)?>:
  <br>
  <textarea cols="40" rows="5" name="Comentario" ><?=$comentario?></textarea>
  <br>
 <div align="center">
          <input name="" type="reset" value="<?=leer_texto("general", "cancelar", $idioma)?>">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="Editar" type="submit" value="<?=leer_texto("general", "editar", $idioma)?>">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="cancelar" type="button" value="<?=leer_texto("general", "cancelar", $idioma)?>" onclick="window.location.href = 'libro_visitas.php'" >
  </div>  
    </div>  
  </td>
  </tr>
  </table>
  </form>
  <br>
<?php

} //fin de la funcion mostrar_formulario();

function validar_formulario(){
    //Comprobamos los posibles valores del formulario
    global $errores_formulario;
    global $nombre;
    global $edad;
    global $comentario;
    
    if ($nombre == "")
        $errores_formulario[] = "El campo Nombre es obligatorio";
    if ($edad == "") {
        $errores_formulario[] = "El campo Edad es obligatorio";
    } else if ($edad < 12 || $edad > 99) {
        $errores_formulario[] = "El campo Edad tiene que ser un numero entre 12 y 99";
    }
    if ($comentario == "")
        $errores_formulario[] = "El campo Comentario es obligatorio";
    else if (strlen($comentario > 200))
        $errores_formulario[] = "El campo comentario no puede exceder de 200 caracteres";
   
} //Fin de la funcion validar_formulario

function mostrar_errores(){
    //Mostramos los errores encontrados en el formulario
    global $errores_formulario;
    foreach ($errores_formulario as $error)
        echo "<center><font color='red'>$error</font></center><br>";        
} //Fin de la funcion mostrar errores

function leer_datos_entrada() {
    //Recuperamos la informacion de la visita
    //Si viene del libro de visitas leemos de la BD
    //Si se ha enviado el formulario leemos las variables $_REQUEST
    global $nombre;
    global $edad;
    global $comentario;
    global $errores_formulario;
    global $id;
    
    $id = $_REQUEST["visita"];
    
    if (isset($_REQUEST["libro_visitas"])) {
        //Venimos del libro de visitas;
	//Tratamos de conectar con la BD
	$con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if (!$con || !mysql_select_db(DB_NAME, $con)) {
            //Ha habido un error al conectar a la BD
	    $errores_formulario["conexion"] = "<center><font color='red'>Error al consultar los datos de la visita : " . mysql_error() . "</font></center><br>";
	} else {
            //Lanzamos la consulta a la BD
            $sql = "SELECT * FROM libro_visitas WHERE ID = $id;";
            $res = mysql_query($sql, $con);
            
            if (mysql_num_rows($res) != 1) {
                //Ha habido un error al conectar a la BD
                $errores_formulario["conexion"] = "<center><font color='red'>Error al consultar los datos de la visita.</font></center><br>";
            } else {
                //introducimos los datos leidos de la BD en las variables para mostrar en el formulario
                $linea = mysql_fetch_array($res);
                $edad = $linea["edad"];
                $nombre = $linea["nombre"];
                $comentario = $linea["comentario"];
            }
        }
    } else {
        //Venimos de haberse enviado el formulario editar visita
        //Leemos los datos del objeto $_REQUEST
        if (isset($_REQUEST["Nombre"]))
            $nombre = $_REQUEST["Nombre"];
        if (isset($_REQUEST["Edad"]))
            $edad = $_REQUEST["Edad"];
        if (isset($_REQUEST["Comentario"]))
            $comentario = $_REQUEST["Comentario"];        
    }
} //Fin de la funcion leer_datos_entrada

//VARIABLES GLOBALES
include("./configuracion.php");
$errores_formulario = array(); //variable global para almacenar los errores del formulario
$nombre="";
$edad="";
$comentario="";

//FIN DE DEFINICIONES DE LA PAGINA

leer_datos_entrada();
if (isset($_REQUEST["Editar"])) {
    //Se ha enviado el formulario. Lo validamos y si es correcto se envia
    validar_formulario(); //Validamos los valores enviados por el formulario
    if (count($errores_formulario) == 0) {
        //formulario sin errores, redirigimos a la pagina de insertar datos
        header("location:editar_visita.php?" . $_SERVER['QUERY_STRING']);
        exit();
    } 
}      
//Mostramos el formulario
cabecera_html("Editar visita");
mostrar_formulario();
mostrar_errores();
pie_html();

?>
