<?php

function mayor ($x, $y)

{

$msg = "";

if ($x > $y)

$msg = $x." es mayor que ".$y;

else

$msg = $y." es mayor que ".$x;

return $msg;

}

$x1=5;

$x2=8;

echo "<hr><p style=\"text-align:center\">".mayor($x1,$x2)."</p><hr>";

?>