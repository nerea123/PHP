<?php

$output1 = `ipconfig`;

echo "<pre>$output1</pre>";

$output2 = shell_exec('ps -o pid,user,tty,cmd');

echo "<pre>$output2</pre>";

?>