<?php

$game = [
    'time' => '12:08',
    'player' => [
        'armor' => rand(1, 100),
        'health' => rand(1, 100),
        'wanted_level' => rand(0, 5),
        'cash' => rand(0, 9999999),
        'position' => [
            'x' => 100.123123,
            'y' => 57.312313,
            'z' => 5.212134
        ],
        'weapons' => [
            'active_id' => rand(0, 2),
            'available' => [
                [
                    'name' => 'Dildo',
                    'damage' => 30,
                    'icon' => 'https://vignette4.wikia.nocookie.net/gtawiki/images/8/81/Chainsaw-GTASA-icon.png/revision/latest?cb=20150609164709',
                    'type' => 'meelee',
                ],
                [
                    'name' => 'Uzi',
                    'damage' => 70,
                    'icon' => 'http://vignette2.wikia.nocookie.net/gtawiki/images/c/c4/Micro-Uzi-GTASA-icon.png/revision/latest?cb=20150609172042',
                    'type' => 'firearm',
                    'ammo' => [
                        'magazine_size' => 150,
                        'in_magazine' => 40,
                        'total' => 900,
                    ]
                ]
            ]
        ],
        'clothes' => [
            'top' => [
                'active_id' => null,
                'available' => [
                    [
                        'name' => 'T-shirt',
                        'model' => '....',
                    ]
                ]
            ],
            'bottom' => [
                'active_id' => null,
                'available' => [
                    [
                        'name' => 'Jeans',
                        'model' => '....',
                    ]
                ]
            ]
        ]
    ]
];
$game['player']['weapons']['available'][] = [
    'name' => 'fist',
    'damage' => 10,
    'icon' => 'http://vignette4.wikia.nocookie.net/gtawiki/images/9/9e/Fist-GTASA-Icon.png/revision/latest/scale-to-width-down/185?cb=20170309235459',
    'type' => 'meelee'
];

$game ['time'] = date('H:i');

$active_id = $game['player']['weapons']['active_id'];
$equiped = $game['player']['weapons']['available'][$active_id]['name'];
$wanted = $game['player']['wanted_level'];
$time = $game ['time'];
$cash = sprintf('%07d', $game['player']['cash']);
$equiped_img = $game['player']['weapons']['available'][$active_id]['icon'];

$armor_width = $game['player']['armor'] . '%';
$health_width = $game['player']['health'] . '%';
$empty_wanted = 5 - $wanted;

//unset($game['player']['weapons']['active_id'][$active_id]);
//
//$keys = array_keys($game['player']['weapons']['available']);
//var_dump($keys);
//var_dump($game['player']['weapons']);
?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>GTA</title>
    <style>
        * {
            margin: 0;
            box-sizing: border-box;
        }

        @font-face {
            font-family: myFirstFont;
            src: url("pricedown.ttf") format("truetype");
        }

        html {
            font-family: myFirstFont;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        section {
            width: 400px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 10px;
        }

        h1 {
            height: 100%;
            padding: 0;
            margin: 0;
            color: grey;
            font-size: 90px;
            display: flex;
            justify-content: center;
        }

        .gun {
            height: 200px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .dildo {
            background-image: url("<?php print $equiped_img ?>");
        }

        .fist {
            background-image: url("<?php print $equiped_img ?>");
        }

        .uzi {
            background-image: url("<?php print $equiped_img ?>");
        }

        .right-container {
            display: grid;
            grid-template-columns: 1fr;
        }

        .armor, .health {
            height: 25px;
            border: 3px solid black;
            border-left: 8px solid black;
            border-right: 8px solid black;
            width: 100%;
            position: relative;
        }

        .armor::before {
            content: '';
            position: absolute;
            height: 100%;
            background-color: antiquewhite;
            width: <?php print $armor_width;?>;
        }

        .health::before {
            content: '';
            position: absolute;
            height: 100%;
            background-color: darkred;
            width: <?php print $health_width;?>;
        }

        .armor-health-container {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .money {
            grid-column: -1 / 1;
            display: flex;
            justify-content: center;
            align-items: center;
            color: darkgreen;
            font-size: 100px;
            width: 100%;
        }

        .wanted {
            grid-column: -1 / 1;
            display: flex;
            justify-content: space-between;
        }

        .wanted img {
            height: 80px;
            width: 80px;
        }

        .money::before {
            content: '$';
        }
    </style>
</head>
<body>
<section>
    <div class="gun <?php print $equiped; ?>">
    </div>
    <div class="right-container">
        <h1 class="time"><?php print $time; ?></h1>
        <div class="armor-health-container">
            <div class="armor"></div>
            <div class="health"></div>
        </div>
    </div>
    <h2 class="money"><?php print $cash; ?></h2>
    <div class="wanted">
            <?php for ($x = 0; $x < $wanted; $x++): ?>
                <img src="http://es.fordesigner.com/imguploads/Image/cjbc/zcool/png20080526/1211811539.png">
            <?php endfor; ?>
            <?php for ($x = 0; $x < ($empty_wanted); $x++): ?>
                <img src="https://cdn1.iconfinder.com/data/icons/vote-reward-1/24/Awward_reward_rate_rating_star_empty-512.png">
            <?php endfor; ?>
    </div>
</section>
</body>