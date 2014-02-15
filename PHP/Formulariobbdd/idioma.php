<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<?php 
		session_start();
		if(isset($_REQUEST['env'])){
			
			if($_REQUEST['lang'] == "Español")
				$_SESSION['idioma'] = "ES";
			else {
				$_SESSION['idioma'] = "IN";
			}
			header("location:ver.php");
		}
		
		 ?>
		</head>
	<body>
		
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>HTML</title>
		<meta name="author" content="Nerea" />
		<!-- Date: 2014-02-10 -->
		<form action="idioma.php" method="get">
		<select name="lang" >
			<option <?php if($_SESSION['idioma'] == "ES" ) {echo "selected=\"selected\""; }?> >Español</option>
			<option <?php if($_SESSION['idioma'] == "IN" ) {echo "selected=\"selected\" "; }?> >Ingles</option>
		</select><br>
		<input type="submit" name="env" value="Aceptar"/>
		</form>
		
	

	</body>
</html>

