<?php

require 'bootloader.php';


/**
 * @param $form
 * @param $safe_input
 * @throws Exception
 */
function form_success(&$form, $safe_input)
{
    $data = file_to_array(TEAMS_DB);
    $data = $data ? $data : [];
    $data[$safe_input['team']]['players'][] = [
        'nickname' => $safe_input['nickname'],
        'score' => 0
    ];

    array_to_file($data, TEAMS_DB);
}

;


$form = [
    'fields' => [
        'team' => [
            'label' => 'Choose your team: ',
            'type' => 'select',
            'value' => '',
            'validate' => [
                'validate_select',
                'validate_not_empty',
            ],
            'option' => [
            ],
            'extra' => [
                'attr' => [
                    'id' => 'teams'
                ]
            ],
        ],
        'nickname' => [
            'label' => 'Enter New Member\'s Name: ',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
            ],
            'validators' => [
                'validate_not_empty',
                'validate_select'
            ],
            'extra' => [
                'attr' => [
                    'placeholder' => 'Type in your nick'
                ]
            ],
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
    'callbacks' => [
        'success' => 'form_success',
    ],
    'validators' => [
        'validate_player'
    ]
];

$teams = file_to_array(TEAMS_DB);
foreach ($teams as $team_id => $team) {
    $form['fields']['team']['option'][$team_id] = $team['team_name'];
}
//var_dump($teams);

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
