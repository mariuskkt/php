<?php
$h1 = 'Pabegimo skaiciuokle';
$police_fuel = rand(0, 20);
$police_cons = 7.5;
$p_distance = round($police_fuel / $police_cons * 100, 1);
$my_fuel = rand(0, 20);
$my_cons = 11.5;
$m_distance = round($my_fuel / $my_cons * 100, 1);
?>

<html>
<head>
</head>
<body>
<?php print $h1; ?>
<ul>
    <li> Farai nuvažiuos: <?php print $p_distance; ?> km.</li>
    <li> AŠ nuvažiuočiau: <?php print $m_distance; ?> km.</li>
</ul>
</body>
</html>
