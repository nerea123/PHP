<?php
//Definicion de funciones

function mostrar_formulario() {
  //el codigo HTML solo se inserta en la pagina si se ejecuta esta funcion
  global $nombre;
  global $edad;
  global $comentario;
  $idioma = $_SESSION["idioma"];
  
  ?>
  <h3><CENTER><?=leer_texto("form_nueva_visita", "titulo1", $idioma)?> <BR></CENTER></h3>
  <form  name="formulario" action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
  <table align="center" border="1" bgcolor="#CCCCFF" bordercolor="#000066" cellpadding="5">
  <tr><td>
  <p align="center">
  <b><?=leer_texto("form_nueva_visita", "titulo2", $idioma)?></b>
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
          <input name="Enviar" type="submit" value="<?=leer_texto("general", "enviar", $idioma)?>">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="cancelar" type="button" value="<?=leer_texto("general", "cancelar", $idioma)?>" onclick="window.location.href = 'libro_visitas.php'" >
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
}

function leer_datos_entrada() {
  //Leemos los datos del objeto $_REQUEST
  global $nombre;
  global $edad;
  global $comentario;
  
  if (isset($_REQUEST["Nombre"]))
    $nombre = $_REQUEST["Nombre"];
  if (isset($_REQUEST["Edad"]))
    $edad = $_REQUEST["Edad"];
  if (isset($_REQUEST["Comentario"]))
   $comentario = $_REQUEST["Comentario"];        
}

//Variables globales
include("./configuracion.php");
$errores_formulario = array(); //variable global para almacenar los errores del formulario
$nombre = "";
$edad = "";
$comentario = "";

//FIN DE DEFINICIONES DE LA PAGINA

//comprobamos si el formulario ha sido enviado
if (isset ($_REQUEST["Enviar"])) {
    //El formulario ha sido enviado
    leer_datos_entrada(); //Leemos los datos de entrada
    validar_formulario(); //Validamos los valores enviados por el formulario
    if (count($errores_formulario) == 0) {
        //formulario sin errores, redirigimos a la pagina de insertar datos
        header("location:insertar_visita2.php?" . $_SERVER['QUERY_STRING']);
        exit(); //evitamos que se muestre el formulario
    }
}
//mostramos el formulario
cabecera_html("Nueva visita");
mostrar_formulario();
mostrar_errores(); //Solo se mostraran errores si los hay
pie_html();
?>
