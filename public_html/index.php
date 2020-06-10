<?php

require '../bootloader.php';

/**
 * if fields are filled in correctly
 * @param $data
 * @param array $safe_input
 * @return void
 * @throws Exception
 */
function form_success($data, array $safe_input): void
{

    $safe_input['email'] = $_SESSION['email'];

    $data = new \App\Pixels\Pixel($safe_input);

    App\App::$db->insertRow('pixels', $data->_getData());

    var_dump($data);
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

$logged_in = App\App::$session->getUser();

if ($logged_in) {

    unset($nav[1], $nav[2]);

    $text = 'Welcome back, ' . $logged_in->getUsername();
    $show_form = true;
} else {
    $show_form = false;
    $text = 'Your are not logged in';
    unset($nav[3]);
}

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}
$conditions = [];

$pixels_array = App\App::$db->getRowsWhere('pixels', $conditions);

$form_template = new Core\Views\Form($form);
$nav_template = new Core\Views\Nav($nav);

//\App\Pixels\Model::insert(new \App\Pixels\Pixel(['x' => 55, 'y' => 60, 'color' => '#000000', 'email' => 'genys@gmail.com']));

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <title></title>
    <style>
    </style>
</head>
<body>
<?php print $nav_template->render() ?>
<main>
    <h1><?php print $text ?></h1>
    <section class="pixels-form">
        <?php if ($show_form) : ?>
            <div class="pixels">
                <?php foreach ($pixels_array as $pixel_id) : ?>
                    <div
                            style="
                                    top:<?php print $pixel_id['x'] ?>px;
                                    left:<?php print $pixel_id['y'] ?>px;
                                    background-color:<?php print $pixel_id['color'] ?>;
                                    "
                            class="single-pixel">
                          <span class="name"
                                style="color:<?php print $pixel_id['color'] ?>">
                        <?php print $pixel_id['email'] ?>
                          </span>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="form">
                <form method="post">
                    <?php print $form_template->render() ?>
                </form>
            </div>
        <?php endif; ?>
    </section>
</main>
</body>
</html>

