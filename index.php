<?php

$string = 'vienas';
$int = 123;
$bool = true;
$null = null;

$li_1 = "String tipas: $string";
$li_2 = "Integer tipas: $int";
$li_3 = "Boolean tipas: $bool";
$li_4 = "Null_tipas: $null";

?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <ul>
            <li><?php print $li_1; ?></li>
            <li><?php print $li_2; ?></li>
            <li><?php print $li_3; ?></li>
            <li><?php print $li_4; ?></li>
        </ul>
    </body>
</html>