<?php

require 'bootloader.php';

$table = [

    'thead' => [
        'username', 'password'
    ],


    'tbody' => [

    ]
];

$data = file_to_array(DB_FILE);

$table['tbody'] = $data ?: [];

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



