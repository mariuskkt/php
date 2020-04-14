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
    $data = file_to_array(TEAMS_DB) ?: [];

    $team = &$data[$_SESSION['team_id']];

    foreach ($team['players'] as &$player_id) {
        if ($player_id['nickname'] == $_SESSION['nick_name']) {
            $player_id['score']++;
        }
    }

    array_to_file($data, TEAMS_DB);
    header("Location: /play.php");
}


$form = [
    'buttons' => [
        'submit' => [
            'title' => 'Kick the ball',
            'validate' => [

            ],
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
$display_form = true;

var_dump($_SESSION);

//sukuriu score variable kad galeciau panaudoti tekste
if ($_SESSION ?? []) {

    $team = $teams[$_SESSION['team_id']];

    foreach ($team['players'] as $player_id) {
        if ($player_id['nickname'] == $_SESSION['nick_name']) {
            $score = $player_id['score'];
        }
    }
}

//tikrinimai del texto
if (!isset($_SESSION['nick_name'])) {
    $display_form = false;
    $text = 'Sorry, we don\'t recognise you. You must join a team first!';
} elseif ($score >= 0) {
    $text = 'Go for it, ' . $_SESSION['nick_name'] . '!' . 'You have scored ' . $score . ' goals';
} else {
    $text = 'Something is wrong';
}

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
    <h1><?php print $text ?></h1>
    <?php if ($display_form) : ?>
        <?php include 'core/templates/form.tpl.php' ?>
    <?php endif; ?>
</main>
</body>
</html>

