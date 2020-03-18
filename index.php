<?php

/**
 * ction generates matrix array
 * @param int $size
 * @return array
 */
function generate_matrix(int $size):array
{
    $matrix = [];

    for ($x = 0; $x < $size; $x++) {
        for ($y = 0; $y < $size; $y++) {
            $matrix[$x][$y] = rand(0, 1);
        }
    };

    return $matrix;
}

$matrix = generate_matrix(3);

var_dump($matrix);

/**
 * @param array $array
 * @return array
 */
function get_winning_rows(array $array):array
{
    $winnings = [];

    foreach ($array as $row_id => $columns) {
        if (array_sum($columns) == count($columns)) {
            $winnings[] = $row_id;
        }
    }

    return $winnings;
}

;

$winnings = get_winning_rows($matrix);
var_dump(get_winning_rows($matrix));


?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>includes</title>
    <style>
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: grid;
            grid: auto-flow 100px / 300px;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-column-gap: 10px;
            padding: 10px;
        }

        .border {
            border: 5px solid darkred;
        }

        .green {
            background-color: darkgreen;
        }

        .black {
            background-color: black;
        }

        .laimejai {
            border: 3px darkred;
        }
    </style>
</head>
<body>
<main>
    <section class="container">
        <?php foreach ($matrix as $row_id => $column): ?>

            <div class="row <?php print(in_array($row_id, $winnings) ? 'border' : 'not'); ?>">
                <?php foreach ($column as $colors): ?>
                    <div class="<?php print ($colors ? 'green' : 'black') ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </section>
</main>
</body>