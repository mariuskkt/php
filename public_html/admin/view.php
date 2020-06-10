<?php

require '../../bootloader.php';

$table = [
    'thead' => [
        'id',
        'name',
        'percentage',
        'volume',
        'amount',
        'price',
        'URL',
        'Edit'
    ],
    'tbody' => []
];

$drinks = \App\Drinks\DrinksModel::getWhere([]);

foreach ($drinks as $drink_index => $drink) {

    $edit = new \Core\Views\Link([
        'url' => '/admin/edit.php?id=' . $drink->getId(),
        'title' => 'Edit',
        'attr' => [
            'class' => 'btn_edit'
        ]
    ]);
    $row = $drink->_getData();
    $row['edit'] = $edit->render();
    $table['tbody'][] = $row;
}

$table_template = new Core\Views\Table($table);

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
    <title></title>
    <style>
    </style>
</head>
<body>
<main>
    <?php print $table_template->render(); ?>
</main>
</body>
</html>
