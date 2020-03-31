<?php

require 'bootloader.php';

function form_success($form, $safe_input)
{
    var_dump('Tu zjbs');
}

function form_failed($form, $safe_input)
{
    var_dump('Tu ne zjbs');
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
        'Name' => [
            'label' => 'Name and surname',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_space'
            ],
            'extra' => [

                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name'
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
//                'validate_max_100',
//                'validate_18_to_100',
                'validate_field_range' =>
                    [
                        'min' => 18,
                        'max' => 100
                    ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'green',
                    'id' => 'pass'
                ]
            ]
        ]
    ],
    'buttons' => [
        'button' => [
            'name' => 'action',
            'type' => 'submit',
            'title' => 'Ar aš normalus?',
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
        <?php print $form['attr']['action']?>
    </form>
</main>
</body>
</html>

