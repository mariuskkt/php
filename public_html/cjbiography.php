<?php

$nav = [
    [
        'name' => 'Home',
        'link' => '/index.php'
    ],
    [
        'name' => 'Cj biography',
        'link' => '/cjbiography.php',
        'drop_down' => [
            [
                'name' => 'Home',
                'link' => '/index.php'
            ],

            [
                'name' => 'nothome',
                'link' => '/nothome.php'
            ],
            [
                'name' => 'next',
                'link' => '/next.php'
            ],
        ]
    ],
    [
        'name' => 'Groove street',
        'link' => '/groovestreet.php'
    ]
];

$footer = [
    'links' => [
        [
            'name' => 'Crack',
            'link' => '/cjbiography.php'
        ],
        [
            'name' => 'Hot Coffee',
            'link' => '/home.php'
        ],
        [
            'name' => 'Cheats',
            'link' => '/groovestreet.php'
        ]
    ],
    'copyright' =>
        [
            'text' => 'Copyright 2020'
        ]
];

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>includes</title>
    <style>
    </style>
</head>
<body>
<?php include 'templates/nav.php' ?>

<main>

</main>
<?php include 'templates/footer.php' ?>
</body>