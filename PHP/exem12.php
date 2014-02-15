<?php

$pla = 'CFGS';

switch ($pla)

{

case 'ESO':

echo '<p>Educació Secundària Obligatòria</p>';

break;

case 'BATX':

echo '<p>Batxillerat</p>';

break;

case 'CFGM':

echo '<p>Cicle Formatiu de Grau Mitjà</p>';

break;

case 'CFGS':

echo '<p>Cicle Formatiu de Grau Superior</p>';

break;

default:

echo '<p>Aquesta codificació no és coneguda</p>';

}

?>