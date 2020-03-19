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
};

$text = 'Graži ir protinga: ';
?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        ul{
            list-style-type: none;
            font-size: 30px;
        }
        img{
            width: 200px;
        }
    </style>
</head>
<body>
<main>
    <div class="fights-container">
        <ul>
            <?php foreach (tinkamos_panos($panos) as $pana): ?>
                <li><?php print $text . $pana['vardas'] ;?></li>
                <img src="<?php print $pana['selfie']?>">
            <?php endforeach; ?>
        </ul>
    </div>
</main>
</body>
</html>

