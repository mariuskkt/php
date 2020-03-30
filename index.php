<?php

require  'bootloader.php';

function form_success($form, $safe_input)
{
    var_dump('success');
}

function form_failed($form, $safe_input)
{
    var_dump('failed');
}


$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'form-id'
    ],
    'callbacks' => [
        'success' => 'form_success',
        'failed' => 'form_failed'
    ],
    'fields' => [
        'first_name' => [
            'label' => 'First name',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty'
            ],
            'extra' => [

                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name'
                ]
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'validate' => [
                'validate_not_empty'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'green',
                    'id' => 'pass'
                ]
            ]
        ],
        'age' => [
            'label' => 'Your age:',
            'type' => 'number',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_max_100'
            ],
            'extra' => [
                'attr' => [
                    'class' => 'green',
                    'id' => 'pass'
                ]
            ]
        ],
        'text' => [
            'label' => 'Type something',
            'type' => 'textarea',
            'value' => '',
            'extra' => [
                'attr' => [

                ]
            ]
        ],
//        'sex' => [
//            'type' => 'radio',
//            'label' => 'Choose one',
//            'option' => [
//                'value' => 'male',
//                'label' => 'Male'
//            ],
//            [
//                'value' => 'female',
//                'label' => 'Female'
//            ],
//            'extra' => [
//                'attr' => [
//
//                ]
//            ]
//        ],
        'cars' => [
            'type' => 'select',
            'label' => '',
            'value' => 'vw',
            'option' => [
                'volvo' => 'VOLVO',
                'vw' => 'Volkswagen',
                'mersedes-benz' => 'Mercedes-Benz'
            ],
            'extra' => [
                'attr' => [

                ]
            ]
        ]
    ],
    'buttons' => [
        'button' => [
            'name' => 'action',
            'type' => 'submit',
            'title' => 'SUBMIT',
            'extra' => [
                'attr' => [

                ]
            ]
        ]
    ]
];


if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);

}

var_dump($_POST);
//var_dump($safe_input);
//var_dump($form['error']);

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
<main>
    <h1>Hack it!</h1>
    <h2><?php print $safe_input['first_name'] ?? ''; ?></h2>
    <h2><?php print $safe_input['password'] ?? ''; ?></h2>
    <form method="post">
        <?php include 'core/templates/form.tpl.php' ?>
    </form>
</main>
</body>
</html>

