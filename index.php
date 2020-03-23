<?php
$array = [
    [
        'a', 'a', 'a', 'g', 'd', 'd'
    ],
    [
        [
                ['a']
            ]
    ]
];

function count_array_values(array $array, $val)
{
    $results = 0;

    foreach ($array as $value) {
        if ($value == $val) {
            $results++;
        }
    }
    return $results;
}


function replace_array_values(array &$random_array, $from, $to)
{
    foreach ($random_array as &$letter) {
        if ($letter == $from) {
            $letter = $to;
        }
    }
}

function replace_values_recursive(array &$array, $from, $to)
{
    foreach ($array as &$letter) {
        if ($letter == $from) {
            $letter = $to;
        }
        else if (is_array($letter)){
            replace_values_recursive($letter,$from,$to);
        }
    }
}

$b = 'b';
$a = 'a';
replace_values_recursive($array, $a, $b);

var_dump($array);
?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <style>
    </style>
</head>
<body>
<main>
    <div class="fights-container">
    </div>
</main>
</body>
</html>

