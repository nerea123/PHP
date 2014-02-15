<?php

function swap_ref(&$x, &$y){

$temp = $x;

$x = $y;

$y = $temp;

}

function swap_valor($x, $y){

$temp = $x;

$x = $y;

$y = $temp;

}

$x = 10;

$y = 20;

echo "<p>valor inicial<br>";

echo "x = $x <br> y = $y</p>";

swap_valor($x, $y);

echo "<p>Después de <i>swap_valor</i><br>";

echo "x = $x <br> y = $y</p>";

swap_ref($x, $y);

echo "<p>Después de <i>swap_ref</i><br>";

echo "x = $x <br> y = $y</p>";

?>