<?php

$pla = 'CFGS';

switch ($pla)

{

case 'ESO':

echo '<p>Educaci� Secund�ria Obligat�ria</p>';

break;

case 'BATX':

echo '<p>Batxillerat</p>';

break;

case 'CFGM':

echo '<p>Cicle Formatiu de Grau Mitj�</p>';

break;

case 'CFGS':

echo '<p>Cicle Formatiu de Grau Superior</p>';

break;

default:

echo '<p>Aquesta codificaci� no �s coneguda</p>';

}

?>