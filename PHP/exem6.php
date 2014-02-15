<html>

<body>

<?php

$preu_net = 100; //preu net

$iva = 0.18; //factor de càlcul d'iva

$percent_iva = $iva * 100;

$total_iva = $preu_net * $iva;

$total = $preu_net + $total_iva;

echo '<table bgcolor="#aabbcc" border="1">',"\n";

echo "<tr><td width=\"100\">Preu Net: </td><td>$preu_net $ </td></tr><br> \n";

echo "<tr><td width=\"100\">IVA: ($percent_iva %): </td>

<td>$total_iva $ </td></tr><br> \n";

echo "<tr><td width=\"100\">Preu Final: </td><td>$total $</td></tr> \n";

echo "</table> \n";

?>

</body>

</html>