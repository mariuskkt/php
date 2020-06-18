<?php

require '../bootloader.php';
/**
 * if fields are filled in correctly
 * @param $form
 * @param $safe_input
 * @throws Exception
 */
function form_success($form, $safe_input)
{
    unset($safe_input['repeat_password']);
    $user = new \App\Users\User($safe_input);
    $user->setRole(\App\Users\User::ROLE_USER);
    \App\Users\Model::insert($user);
    header("Location: /login.php");
}

$form = [
    'fields' => [
        'username' => [
            'label' => 'User name: ',
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
        'name' => [
            'label' => 'Name: ',
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
        'surname' => [
            'label' => 'Last name: ',
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
            'label' => 'Password: ',
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
            'label' => 'Repeat password: ',
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
    ]
];

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

$form_template = new Core\Views\Form($form);
$nav_template = new App\Views\Nav();

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
