<?php
$h1 = 'Pabegimo skaiciuokle';
$police_fuel = rand(0, 20);
$police_cons = 7.5;
$p_distance = round($police_fuel / $police_cons * 100, 1);
$my_fuel = rand(0, 20);
$my_cons = 11.5;
$m_distance = round($my_fuel / $my_cons * 100, 1);

$mentai_nuvaziuos = 'Farai nuvažiuos: ' . $p_distance . 'km';
$as_nuvaziuosiu = 'AŠ nuvažiuočiau:' . $m_distance . 'km.';
?>

<html>
<head>
</head>
<body>
<?php print $h1; ?>
<ul>
    <li> <?php print $mentai_nuvaziuos; ?></li>
    <li> <?php print $as_nuvaziuosiu; ?></li>
</ul>
</body>
</html>
