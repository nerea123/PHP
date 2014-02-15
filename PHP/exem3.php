<html>
<body>
<h3>Exemple</h3>
<?php
function variable(){
global $var1;
$var2="<h3>Adeu</h3>";
echo $var1;
echo $var2;
}

$var1="<h2>Benvingut a PHP</h2>";
$var2="<h2> Adeu PHP</h2>";
echo $var1, $var2;
variable();
?>

</body>
</html>