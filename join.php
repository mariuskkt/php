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


    $team_name = $safe_input['team'];
    $nickname = $safe_input['nickname'];

    session_start();

    $_SESSION['team_id'] = $team_name;
    $_SESSION['nick_name'] = $nickname;
    var_dump($_SESSION);
    var_dump($_COOKIE);

    header("Location: /play.php");
}
$form = [
    'fields' => [
        'team' => [
            'label' => 'Choose your team: ',
            'type' => 'select',
            'value' => '',
            'validate' => [
                'validate_select',
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
        'validate_player',
        'validate_kick'
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

$teams = file_to_array(TEAMS_DB);

//idedu komandos pavadinima tarp select optionu
foreach ($teams as $team_id => $team) {
    $form['fields']['team']['option'][$team_id] = $team['team_name'];
}

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
}

$display_form = true;

//panaikinu forma jei cookie aktyvus ir spausdinu teksta
if (isset($_COOKIE['team_id']) && $_COOKIE['nick_name']) {
    $display_form = false;
    $text = 'Sveikas, ' . $_COOKIE['nick_name'] . ', tu esi registruotas '
        . $teams[$_COOKIE['team_id']]['team_name'] . ' komandoj';
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
    <section>
        <?php if ($display_form) : ?>
            <h1>Registration</h1>
            <form method="post">
                <?php include 'core/templates/form.tpl.php' ?>
            </form>
        <?php elseif (!$display_form) : ?>
            <h2><?php print $text ?></h2>
        <?php endif; ?>
    </section>
</main>
</body>
</html>
