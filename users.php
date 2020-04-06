<?php

require 'bootloader.php';

$table = [

    'thead' => [
        'Klausimas', 'Taip(%)'
    ],

];

$questions = [
    'question_1' => 'Ar laikai kardaną?',
    'question_2' => 'Ar kali į baką?',
    'question_3' => 'Ar rūkai žolelių arbatą?'
];

$data = file_to_array(DB_FILE) ?: [];

//$table['tbody'] = $data ?: [];


$sum_participants = count($data);
$h2 = 'Viso apklausoj dalyvavo: ' . $sum_participants;

$statistics = [];
var_dump($data);
foreach ($data as $participant) {
    foreach ($participant as $question_id => $answer) {
        if (!isset($statistics[$question_id])) {
            $statistics[$question_id] = 0;
        }
        if ($answer == 'taip') {
            $statistics[$question_id]++;
        }
    }
};

foreach ($statistics as $question_id => $count) {
    $table['tbody'][] = [
        $questions[$question_id],
        round($count / $sum_participants * 100)
    ];
}
var_dump($statistics);


//var_dump($table);

?>

<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="app/assets/css/table-style.css"/>
    <title></title>
    <style>
    </style>
</head>
<body>
<main>
    <?php include 'core/templates/table.tpl.php' ?>
</main>
</body>
</html>



