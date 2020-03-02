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

if ($m_distance > $p_distance) {
    $result = 'pabegau';
} else {
    $result = 'cbb';
}
?>

<html>
<head>
    <style>
        div {
            height: 400px;
            width: 400px;
            background-position: center;
            background-size: cover;
        }

        h1 {
            color: antiquewhite;
        }

        img {
            width: 100%;
            height: 100%;
        }

        .cbb {
            background-image: url("http://assets.nydailynews.com/polopoly_fs/1.1483522.1381589546!/img/httpImage/image.jpg_gen/derivatives/article_970/nypdblow12n-1-web.jpg");
        }

        .pabegau {
            background-image: url("https://www.telesurtv.net/__export/1478180857205/sites/telesur/img/news/2016/09/13/tupac_ftp1.jpg_1810791533.jpg");
        }
    </style>
</head>
<body>
<?php print $h1; ?>
<ul>
    <li> <?php print $mentai_nuvaziuos; ?></li>
    <li> <?php print $as_nuvaziuosiu; ?></li>
    <div class="<?php print $result ?>"><h1><?php print $result; ?></h1></div>
</ul>
</body>
</html>
