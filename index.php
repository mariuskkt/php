<?php
$my_soldiers = 10;
$enemy_soldiers = rand(5, 15);
$fights = [];
var_dump($enemy_soldiers);
$win_perc = $my_soldiers / ($enemy_soldiers + $my_soldiers) * 100;

while ($my_soldiers > 0 && $enemy_soldiers > 0) {

    $fight = ['enemy_down' => 0];

    while ($enemy_soldiers > 0) {

        if (rand(0, 100) <= $win_perc) {
            $fight['enemy_down']++;
            $enemy_soldiers--;
        } else {
            $my_soldiers--;
            break;
        }
    }
    $fights[] = $fight;
}
var_dump($fights);

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        .fight {
            display: flex;
        }

        .fight div {
            padding: 20px;
            font-size: 20px;
        }

        .my-soldier {
            background: green;
        }

        .enemy-soldier {
            background: red;
        }
    </style>
</head>
<body>
<main>
    <div class="fights-container">
        <?php foreach ($fights as $fight): ?>
            <div class="fight">
                <div class="my-soldier">M</div>
                <div class="hedge">-</div>
                <?php for ($i = 0; $i < $fight['enemy_down']; $i++): ?>
                    <div class="enemy-soldier">E</div>
                <?php endfor; ?>
            </div>
        <?php endforeach; ?>
    </div>
</main>
</body>
</html>

