<?php
$h1 = 'Pabegimo skaiciuokle';
$police_fuel = rand(0, 20);
$police_cons = 7.5;
$p_distance = round($police_fuel / $police_cons * 100, 1);
$my_fuel = rand(0, 20);
$my_cons = 11.5;
$m_distance = round($my_fuel / $my_cons * 100, 1);

$policija_img = 'https://cdn.shopify.com/s/files/1/0799/8983/products/Police-Car_1024x1024.png?v=1473532117';
$multipla_img = 'http://www.greasenergy-shop.com/WebRoot/Store2/Shops/63102114/52E2/68CD/BFE1/4995/8F96/C0A8/2BB8/CBF1/Multipla.png';
$arrow_img = 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/71/Arrow_east.svg/1024px-Arrow_east.svg.png';
$bybis_img = 'https://www.station-beast.ch/components/com_jshopping/files/img_products/thumb_edfwesffdvgyrf.png';

$mentai_nuvaziuos = 'Farai nuvažiuos: ' . $p_distance . 'km';
$as_nuvaziuosiu = 'AŠ nuvažiuočiau:' . $m_distance . 'km.';


$distance = $m_distance - $p_distance;

if ($distance >= 0) {
    $h2 = 'Mentai bus už ' . $distance . 'km';
    $bybis = 'bybis_none';
    $display = 'arrow_display';
    $policija = 'policija_none';
} else {
    $display = 'arrow';
    $policija = 'policija';
    $h2 = ' Mentai bus visai čia pat ';
    $bybis = 'bybis_display';
}
?>

<html>
<head>
    <style>
        img {
            width: 200px;
            height: 200px;
        }

        .arrow {
            display: none;
        }

        .arrow_display {
            display: block;
        }

        .policija {
            display: block;
            transform: translateX(50%) rotate(-45deg);
            position: relative;
        }

        .policija_none {
            display: block;
            position: relative;
        }

        .bybis {
            transform: rotate(80deg);
            position: absolute;
            top: 50%;
            left: 12%;
            height: 40px;
            width: 40px;
        }

        .bybis_none {
            display: none;
        }

        .bybis_display {
            display: block;
        }

        .container {
            display: flex;
            position: relative;
            align-items: center;
        }

        .photo_container img {
            object-fit: scale-down;
        }
    </style>
</head>
<body>
<?php print $h1; ?>
<ul>
    <li> <?php print $mentai_nuvaziuos; ?></li>
    <li> <?php print $as_nuvaziuosiu; ?></li>
</ul>
<h2><?php print $h2; ?></h2>
<div class="container">
    <div class="photo_container">
        <img class="<?php print $policija; ?>"
             src=<?php print $policija_img; ?>>
        <img class="bybis <?php print $bybis; ?>"
             src=<?php print $bybis_img; ?>>
    </div>
    <div class="photo_container <?php print $display; ?>">
        <img src=<?php print $arrow_img; ?>>
    </div>
    <div class="photo_container">
        <img src=<?php print $multipla_img; ?>>
    </div>
</div>
</body>
</html>
