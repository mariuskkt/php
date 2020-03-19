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


$text = 'Atsitiktinai parinktos panos vardas: ' . get_random_girl_name($panos);

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
        <ul>
            <p><?php print $text; ?></p>
        </ul>
    </div>
</main>
</body>
</html>

