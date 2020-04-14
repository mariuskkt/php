<?php

require 'bootloader.php';

/**
 * if all inputs has been validated,then sends inputs to DB file
 * @param $form
 * @param $safe_input
 * @throws Exception
 */
function form_success(array $form, array $safe_input)
{
    $file_name = TEAMS_DB ?: [];

    $data = file_to_array($file_name) ?: [];
    $data[] = [
        'team_name' => $safe_input['team_name'],
        'players' => []
    ];
    array_to_file($data, $file_name);

    header("Location: /join.php");
}

$form = [
    'fields' => [

        'team_name' => [
            'label' => 'Team name ',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_team',
                'validate_text_length' => [
                    'min' => 2,
                    'max' => 10
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name',
                    'placeholder' => 'Create your team'
                ]
            ]
        ]
    ],
    'buttons' => [
        'button' => [
            'type' => 'submit',
            'title' => 'Register',
            'extra' => [
                'attr' => [

                ]
            ]
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
    ]
];

$nav = [
    [
        'link' => '/create.php',
        'name' => 'CREATE A TEAM'
    ],
    [
        'link' => '/join.php',
        'name' => 'JOIN TEAM'
    ],
    [
        'link' => '/play.php',
        'name' => 'Just click and PLAY'
    ]
];

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

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
    <h1>Registration</h1>
    <section>
        <form method="post">
            <?php include 'core/templates/form.tpl.php' ?>
        </form>
    </section>
</main>
</body>
</html>
