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
    $user = new \App\Users\User($safe_input);

    App\App::$db->insertRow('users',
        $user->_getData());

    header("Location: /login.php");
}

$form = [
    'fields' => [
        'username' => [
            'label' => 'User name ',
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
        'email' => [
            'label' => 'Your email: ',
            'type' => 'email',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_email_unique',
                'validate_email'
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
        'repeat_password' => [
            'label' => 'Repeat password ',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [

                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name',
                    'step' => 'any'
                ]
            ]
        ],
    ],
    'buttons' => [
        'button' => [
            'name' => 'action',
            'type' => 'submit',
            'title' => 'Register',
            'extra' => [
                'attr' => [

                ]
            ]
        ]
    ],
    'validators' => [
        'validate_fields_match' => [
            'password',
            'repeat_password'
        ],
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

unset($nav[3]);


if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

var_dump($_POST);
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
    <h1>Registration</h1>
    <form method="post">
        <?php print $form_template->render() ?>
    </form>
</main>
</body>
</html>
