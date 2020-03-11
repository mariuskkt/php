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

$bank_acc = [
    [
        'name' => 'Iki darbo uzmokestis',
        'amount' => 600,
        'type' => 'income'
    ],

    [
        'name' => 'Kalvariju nacnykas',
        'amount' => -15,
        'type' => 'expenses'

    ],


    [
        'name' => 'Rustamas Cigonidze',
        'amount' => -50,
        'type' => 'expenses'
    ],


    [
        'name' => 'Nakvynes namai',
        'amount' => -10,
        'type' => 'expenses'
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
        .expenses {
            color: darkred;
            list-style-type: none;
        }

        .income {
            color: darkgreen;
            list-style-type: none;
        }

        main {
            padding: 0 150px;
        }
    </style>
</head>
<body>
<?php include 'templates/nav.php' ?>

<main>
    <h1>Banko ataskaita</h1>
    <ul>
        <?php foreach ($bank_acc as $money) : ?>
            <li class="<?php print $money['type'] ?>">
                <?php print $money['name'] . ' ' . $money['amount']; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</main>

<?php include 'templates/footer.php' ?>
</body>