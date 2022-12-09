<?php
$f = fopen("form.txt", "w");
fwrite($f, "PHP is fun!");
fclose($f);
$f = fopen("textfile.txt", "r");
echo fgets($f);
fclose($f);
?>