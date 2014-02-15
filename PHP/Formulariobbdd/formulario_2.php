<?php
include("./configuracion.php");
$errores_formulario = array(); //variable global para almacenar los errores del formulario

function mostrar_formulario() {
        //el codigo HTML solo se inserta en la pagina si se ejecuta esta funcion
      if (isset($_REQUEST["error_bd"])) {
        echo "<center><font color='red'>Error al insertar la visita. Por favor intentelo de nuevo</font></center><br>";
      }
?>
        <h3><CENTER>FORMULARIO QUE MUESTRA LOS ERRORES AL PRINCIPIO <BR> Se envia los datos a si mismo para validar</CENTER></h3>
        <table align="center" border="1" bgcolor="#CCCCFF" bordercolor="#000066" cellpadding="5">
        <tr><td>
        <form  name="formulario" action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
        <p align="center">
        <b>DATOS PARA INCLUIR EN EL LIBRO</b>
        </p>
        NOMBRE:<br>
        <input name="Nombre" type="text" size="25" maxlength="25" value=
        <?php 
          if (isset($_REQUEST["Nombre"])) {
            echo($_REQUEST["Nombre"]);
          } 
        ?>
        >
        <br>
        EDAD:
        <br>
        <input name="Edad" type="text"  size="5" maxlength="5" value= 
        <?php 
          if (isset($_REQUEST["Edad"])) {
            echo($_REQUEST["Edad"]);
          } 
        ?>
        >
        <br>
        COMENTARIO:
        <br>
        <textarea cols="40" rows="5" name="Comentario" ><?php 
          if (isset($_REQUEST["Comentario"])) {
            echo($_REQUEST["Comentario"]);
          } 
        ?></textarea>
        <br>
        <div align="center">
                <input name="" type="reset" value="Borrar">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="Enviar" type="submit" value="Enviar">
        </div>
        </form>
        </td></tr>
        </table>
        <br>

<?php

} //fin de la funcion mostrar_formulario();

function validar_formulario(){
    //Comprobamos los posibles valores del formulario
    global $errores_formulario;
    
    if ($_REQUEST["Nombre"] == "")
        $errores_formulario[] = "El campo Nombre es obligatorio";
    if ($_REQUEST["Edad"] == "")
        $errores_formulario[] = "El campo Edad es obligatorio";
    if ($_REQUEST["Comentario"] == "")
        $errores_formulario[] = "El campo Comentario es obligatorio";
   
} //Fin de la funcion validar_formulario

function mostrar_errores(){
    //Mostramos los errores encontrados en el formulario
    global $errores_formulario;
    foreach ($errores_formulario as $error)
        echo "<center><font color='red'>$error</font></center><br>";        
}

//FIN DE DEFINICIONES DE LA PAGINA

//comprobamos si el formulario ha sido enviado y no viene de un error de fichero
if (isset ($_REQUEST["Enviar"]) && !isset($_REQUEST["error_bd"])) {
    //El formulario ha sido enviado 
    validar_formulario(); //Validamos los valores enviados por el formulario
    if (count($errores_formulario) == 0) {
        //formulario sin errores, redirigimos a la pagina de insertar datos
        header("location:insertar_visita2.php?" . $_SERVER['QUERY_STRING']);
    } else {
        //Formulario con errores, mostramos los errores y el formulario de nuevo
        cabecera_html("Libro de visitas con errores!!");
        mostrar_formulario();
        mostrar_errores();
        pie_html();
    }
} else {
    //mostramos el formulario original antes de haber sido enviado
    cabecera_html("Libro de visitas original");
    mostrar_formulario();
    pie_html();
}
?>
