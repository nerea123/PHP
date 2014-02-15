<html>
	<head></head>
	<body>
		<form action="3.4.php" method="post">
		Introduce tu email<input type="text" name="email"/><br>
		<input type="submit" value="Validar" />
		</form>
	</body>
</html>

<?php
    
   function comprobar_email($email){
 
  $email = trim($email);
  $arroba = false;
  $punto = false;
  $posicionArroba=0;
  $subcadena="";
  
  if($posicionArroba=strpos($email, "@")){
   $arroba = true;
  }
  
  
  $subcadena=substr($email, $posicionArroba);
  
 if(strpos($subcadena, ".")) {
   $punto = true;
  }
  

  
  if($arroba && $punto){
   return true;
  }else{
   return false;
  }
 }
   if(isset($_REQUEST['email'])){
   	
	$email = $_REQUEST['email'];
	
	if(comprobar_email($email ))
		echo "Email valido";
	else
		echo "Email no valido";
   }
?>