<?php

require '../bootloader.php';


/**
 * if fields are filled in correctly
 * @param $data
 * @param $safe_input
 * @throws Exception
 */
function form_success($data, $safe_input)
{
    App\App::$session->login($safe_input['email'], $safe_input['password']);

    header("Location: /index.php");
}

$form = [
    'fields' => [
        'email' => [
            'label' => 'Your email: ',
            'type' => 'email',
            'value' => '',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name',
                ]
            ]
        ],
        'password' => [
            'label' => 'Password ',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [

                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name',
                ]
            ]
        ],
    ],
    'buttons' => [
        'button' => [
            'name' => 'action',
            'type' => 'submit',
            'title' => 'Join',
            'extra' => [
                'attr' => [

                ]
            ]
        ]
    ],
    'validators' => [
//        'validate_email_unique'
        'validate_login'
    ],
    'callbacks' => [
        'success' => 'form_success',
//        'failed' => 'form_failed'
    ]
];

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


if (!isset($_SESSION['email'])) {
    unset($nav[3]);
} else {
    unset($nav[2]);
}

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

var_dump($_POST);
var_dump($_SESSION);
var_dump($_COOKIE);

$form_template = new Core\Views\Form($form);
$nav_template = new Core\Views\Nav($nav);

$form_path = ROOT . '/core/templates/form.tpl.php';
$nav_path = ROOT . '/app/templates/nav.php';
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
    <h1>Login</h1>
    <form method="post">
        <?php print $form_template->render() ?>
    </form>
</main>
</body>
</html>