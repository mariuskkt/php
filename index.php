<?php
$title= "Lenta | PHP Fight Club";
$p = date("Y/m/d") . "Marius grįžo į PHPFIGHTCLUB'ą!";
$menuo = date( "Y-m-d", strtotime( "now +1 month" ) ) . " Busiu cia.";
$sekunde = "Per sia sekunde organizmas pagamino " . $random = rand(20, 30)/10 . " ml. kraujo.";
$moneta = rand(1 , 2);
$imgsrc = 'assets/moneta' . $moneta . '.jpg';
$x = (rand(0, 1);
if ($x , $x =1){
    print 'tails'
        else
            print 'heads';
}
?>
<html>
<head>
    <title><?php print $title?></title>
</head>
<main>
    <p><?php print $p ?></p>
    <p><?php print $menuo ?></p>
    <p><?php print $sekunde ?></p>

    <div>
        <img src="<?php print $imgsrc ?>" alt="">
    </div>
</main>
</html>