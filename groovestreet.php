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
</body>