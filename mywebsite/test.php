<?php

$text =
'abcdefghijklmnopqrstuvwxyz123456789';

$panj = 10;

$txtl = strlen($text) - 1;

$result = '';

for($i=1; $i<=$panj ;$i++){

    $result .= $text[rand(0,$txtl)];
}

echo $result;

?>