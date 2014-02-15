<?php
include("configuracion.php");
$errores_formulario = array(); //variable global para almacenar los errores del formulario

function mostrar_formulario() {
    //el codigo HTML solo se inserta en la pagina si se ejecuta esta funcion
    global $errores_formulario;
    $nombre = "";
    $edad = "";
    $comentario = "";
    
    //recuperamos los valores del formulario (en el caso que existan)
    //los metemos en variables para inlcuirlos en los campos del formulario
    if (isset($_REQUEST["Nombre"]))
	$nombre = $_REQUEST["Nombre"];	
    if (isset($_REQUEST["Edad"]))
	$edad = $_REQUEST["Edad"];
    if (isset($_REQUEST["Comentario"]))
	$comentario = $_REQUEST["Comentario"];
?>
    <H3><center>FORMULARIO QUE EN UN MISMO ARCHIVO VALIDA E INSERTA LOS DATOS.<BR>
    Si encuentra errores en el formulario resalta los campos.</center></H3>
    
<?php
    //Comprobamos si venimos de un error en el acceso al fichero
    //En tal caso mostramos el error al principio
    if (isset($errores_formulario["error_fichero"]))
        echo($errores_formulario["error_fichero"]);
?>
    <table align="center" border="1" bgcolor="#CCCCFF" bordercolor="#000066" cellpadding="5">
        <tr><td>
        <form  name="formulario"  action="formulario_3.php" method="post">
        <p align="center">
        <b>DATOS PARA INCLUIR EN EL LIBRO</b>
        </p>
        NOMBRE:
        <?php
	  //Si no ha introducido el nombre mostramos un error
          if (isset($errores_formulario["Nombre"])) {
              echo($errores_formulario["Nombre"]);
          } 
        ?>
        <br>
        <input name="Nombre" type="text" size="25" maxlength="25" value="<?=$nombre ?>">
        <br>
        EDAD:
        <?php 
          //Si no ha introducido la edad mostramos un error
	  if (isset($errores_formulario["Edad"])) {
              echo($errores_formulario["Edad"]);
          } 
        ?>
        
        <br>
        <input name="Edad" type="text"  size="5" maxlength="5" value="<?=$edad ?>">
        <br>
        COMENTARIO:
        <?php
	  //Si no ha introducido el comentario mostramos un error
          if (isset($errores_formulario["Comentario"])) {
              echo($errores_formulario["Comentario"]);
          } 
        ?>
        
        <br>
        <textarea cols="40" rows="5" name="Comentario" ><?=$comentario ?></textarea>
        <br>
        <div align="center">
                <input name="" type="reset" value="Borrar">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="Enviar" type="submit" value="Enviar">
        </div>
        </form>
        </td></tr></table>

<?php

} //fin de la funcion mostrar_formulario();

function validar_formulario(){
    //Comprobamos los posibles valores del formulario
    global $errores_formulario;
    
    if ($_REQUEST["Nombre"] == "")
	$errores_formulario["Nombre"] = "<font color='red'>El campo Nombre es obligatorio</font>";
    if ($_REQUEST["Edad"] == "")
	$errores_formulario["Edad"] = "<font color='red'>El campo Edad es obligatorio</font>";
    if ($_REQUEST["Comentario"] == "")
	$errores_formulario["Comentario"] = "<font color='red'>El campo Comentario es obligatorio</font>";
    
} //Fin de la funcion validar_formulario

function insertar_visita(){
    //Insertamos la visita en el archivo del libro de visitas
    global $errores_formulario;
    $nombre=trim($_REQUEST["Nombre"]);
    $edad=trim($_REQUEST["Edad"]);
    $comentario=trim($_REQUEST["Comentario"]);
    
    $f=fopen(FICHERO_LIBRO,"a");  //abro archivo para leer al final, si no existe lo crea
	if ($f){
	    //A continuación preparo una cadena con los tres datos de la visita
	    //utilizando una cadena separadora.
	    $comentario=str_replace("\n","<br>",$comentario);  //
	    $linea=$nombre.SEPARADOR.$edad.SEPARADOR.$comentario."\r\n";
	    fwrite($f,$linea); //Guarda línea en el fichero. De esta manera utilizo
			    //una línea por registro.Se ha de tener en cuenta
			    //que con esta solución  debe tenerse cuidado con los caracteres
			    //de fin de línea en el área de texto donde se introduce
			    //el comentario. Lo que hago es cambiar el carácter \n por 
			    // la cadena <br> antes de guardar los datos en el fichero
			    
	    fclose($f); //cerramos siempre el fichero tras utilizarlo
	    header("location:libro_visitas.php?formulario=formulario_3.php"); //Mostramos el libro de visitas
	} else {
	    //se ha producido un error al acceder al fichero
	    //mostramos el formulario de nuevo con los datos
	    $errores_formulario["error_fichero"] = "<center><font color='red'>Error al insertar la visita. Intentelo de nuevo.</font></center> \n";
	    cabecera_html("Error al acceder al fichero!!");
	    mostrar_formulario();
	    pie_html();
	}
} //Fin de la funcion insertar_visita

//FIN DE DEFINICION DE FUNCIONES

//comprobamos si el formulario ha sido enviado
if (isset ($_REQUEST["Enviar"])) { 
    //El formulario ha sido enviado 
    validar_formulario(); //Validamos los valores enviados por el formulario
    if (count($errores_formulario) == 0) {
        //formulario sin errores insertamos los datos
        insertar_visita();        
    } else {
        //Formulario con errores, mostramos los errores y el formulario de nuevo
        cabecera_html("Libro de visitas con errores!!");
        mostrar_formulario();
        pie_html();
    }
} else {
    //mostramos el formulario original antes de haber sido enviado
    cabecera_html("Libro de visitas original");
    mostrar_formulario();
    pie_html();
}
?>
