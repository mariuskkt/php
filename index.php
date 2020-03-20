<?php
$panos = [
    [
        'vardas' => 'Monika',
        'grazi' => true,
        'protinga' => false
    ],
    [
        'vardas' => 'Greta',
        'grazi' => true,
        'protinga' => true,
        'selfie' => 'https://thefw.com/files/2013/05/judussteer-tumblr.jpg'
    ],
    [
        'vardas' => 'Milda',
        'grazi' => true,
        'protinga' => false

    ],
    [
        'vardas' => 'Inga',
        'grazi' => true,
        'protinga' => true,
        'selfie' => 'http://4.bp.blogspot.com/-tOpiLf9F5ys/UMSAvLPAz1I/AAAAAAAASEA/gfu4TvIqR1E/s1600/smiling+horse.jpg'
    ]
];


/**
 * Funkcija grazina tik grazias ir protingas panas
 * @param array $panos
 * @return array
 */
function tinkamos_panos(array $panos): array
{
    $tinkamos_panos = [];
    foreach ($panos as $pana) {
        if ($pana['grazi'] && $pana['protinga']) {
            $tinkamos_panos[] = $pana;
        }
    }

    return $tinkamos_panos;
}


/**
 * Funkcija grazina random varda is array
 * @param array $panos
 * @return string
 */
function get_random_girl_name(array $panos): string
{
    $index_rand = array_rand($panos);
    $name = $panos[$index_rand]['vardas'];

    return $name;
}

/**
 * procentaliai panos kurios yra grazios ir protingos is array
 * @param array $panos
 * @return float
 */
function get_grazio_protingos_rate(array $panos): float
{
    $good_girls = count(tinkamos_panos($panos));
    $total_girls = count($panos);

    return round($good_girls * 100 / $total_girls, 1);
}


$filter = [
    'vardas' => 'Inga',
    'grazi' => true
];

/**
 * generuoja isfiltruota array jei randa tokius indexus ir value kurie pateikti funkcijoj
 * @param array $array
 * @param string $col
 * @param string $col_value
 * @return array
 */
function filter_array(array $array, $conditon): array
{
    $results = [];

    foreach ($array as $index) {
        foreach ($conditon as $key => $value) {
            if ($key === $index[$key] && $value === $index[$value]) {
                $results[] = $index;
            }
        }
    }

    return $results;
}

//var_dump(filter_array($panos, $filter));
$results = [];
foreach ($panos as $index => $value) {
    foreach ($filter as $key => $filter_value) {
        $match = true;

        if ($value[$key] !== $filter_value) {
            
            $match = false;
            break;
        }

        $results[] = $value;

    }
}
var_dump($results);
$text = 'Atsitiktinai parinktos panos vardas: ' . get_random_girl_name($panos);
$h1 = 'Graziu ir protingu panu yra ' . get_grazio_protingos_rate($panos) . '%';

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        ul {
            list-style-type: none;
            font-size: 30px;
        }

        img {
            width: 200px;
        }
    </style>
</head>
<body>
<main>
    <div class="fights-container">
        <h1><?php print $h1; ?></h1>
    </div>
</main>
</body>
</html>

