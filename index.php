<?php

require 'bootloader.php';

/**
 * if fields are filled in correctly
 * @param $form
 * @param $safe_input
 * @throws Exception
 */
function form_success($form, $safe_input)
{
    $file_name = 'app/data/users.json';

    $data = file_to_array($file_name) ?: [];

    foreach ($data as &$users) {
        if ($users['email'] == $_SESSION['email']) {
            $users['pixels'][] = [
                'x' => $safe_input['x'],
                'y' => $safe_input['y'],
                'color' => $safe_input['color']
            ];
        }
    }

    array_to_file($data, $file_name);
}

$nav = [
    [
        'link' => '/index.php',
        'name' => 'Home'
    ],
    [
        'link' => '/register.php',
        'name' => 'Register'
    ],
    [
        'link' => '/login.php',
        'name' => 'Login'
    ],
    [
        'link' => '/logout.php',
        'name' => 'logout'
    ]
];

$form = [
    'fields' => [
        'x' => [
            'label' => 'X: ',
            'type' => 'number',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_field_range' => [
                    'min' => 0,
                    'max' => 500
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name',
                ]
            ]
        ],
        'y' => [
            'label' => 'Y: ',
            'type' => 'number',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_field_range' => [
                    'min' => 0,
                    'max' => 500
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name',
                ]
            ]
        ],
        'color' => [
            'label' => 'Choose color: ',
            'type' => 'color',
            'value' => '',
            'validate' => [

            ],
            'extra' => [
                'attr' => [
                    'class' => 'color',
                    'id' => 'color',
                ]
            ]
        ],
    ],
    'buttons' => [
        'button' => [
            'name' => 'action',
            'type' => 'submit',
            'title' => 'Paint your pixels',
            'extra' => [
                'attr' => [

                ]
            ]
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
//        'failed' => 'form_failed'
    ],
    'validators' => [
        'validate_pixels' => [
            'x',
            'y'
        ]
    ]
];


$logged_in = is_logged_in();

if ($logged_in) {

    unset($nav[1], $nav[2]);

    $file_name = 'app/data/users.json';
    $data = file_to_array($file_name);

    foreach ($data as $user_id) {
        if ($user_id['email'] == $_SESSION['email']) {
            $name = $user_id['user_name'];
            $text = 'Welcome back, ' . $name;
        }
    }
    $pixels = true;
} else {
    $pixels = false;
    $text = 'Your are not logged in';
    unset($nav[3]);
}

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

$file_name = 'app/data/users.json';
$users = file_to_array($file_name) ?: [];


var_dump($_POST);
?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="app/assets/css/style.css"/>
    <title></title>
    <style>
    </style>
</head>
<body>
<?php include 'app/templates/nav.php' ?>
<main>
    <h1><?php print $text ?></h1>
    <?php if ($pixels) : ?>
        <div class="form">
            <form method="post">
                <?php include 'core/templates/form.tpl.php' ?>
            </form>
        </div>
        <div class="pixels">
            <?php foreach ($users as $user_id) : ?>
                <?php foreach ($user_id['pixels'] ?? [] as $pixel_id): ?>
                    <div
                            style="
                                    top:<?php print $pixel_id['x'] ?>px;
                                    left:<?php print $pixel_id['y'] ?>px;
                                    background-color:<?php print $pixel_id['color'] ?>;
                                    "
                            class="single-pixel">
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>
</body>
</html>

