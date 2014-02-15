<?php

$a = 0;

while ($a < 10) {

if ($a == 5)
break;

$a++;

echo "<p>$a</p>";

}

$a = 0;

while ($a < 5) {

$a++;

if ($a == 2)

continue;

echo "\$a vale $a<br>";

}

?>