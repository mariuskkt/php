<?php

require '../../../bootloader.php';


function delete_success($delete_form, $safe_input)
{
    \App\Drinks\Model::deletebyId($safe_input['id']);
}

if (!\App\App::$session->userIs(\App\Users\User::ROLE_ADMIN)) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

$table = [
    'thead' => [
        'id',
        'name',
        'percentage',
        'volume',
        'amount',
        'price',
        'Edit',
        'Delete'
    ],
    'tbody' => []
];

$delete_form = [
    'attr' => [
        'class' => 'delete_form'
    ],
    'fields' => [
        'id' => [
            'type' => 'hidden',
            'value' => ''
        ],
    ],
    'buttons' => [
        'button' => [
            'name' => 'action',
            'type' => 'submit',
            'title' => 'Delete'
        ]
    ],
    'callbacks' => [
        'success' => 'delete_success',
    ]
];

if ($_POST) {
    $safe_input = get_filtered_input($delete_form);
    validate_form($delete_form, $safe_input);
};

$drinks = \App\Drinks\Model::getWhere([]);

foreach ($drinks as $drink) {

    $edit_link = new \Core\Views\Link([
        'url' => '/admin/products/edit.php?id=' . $drink->getId(),
        'title' => 'Edit',
        'attr' => [
            'class' => 'btn_edit'
        ]
    ]);

    $row = $drink->_getData();
    unset($row['photo']);
    $delete_form['fields']['id']['value'] = $drink->getId();
    $delete_btn = new \Core\Views\Form($delete_form);
    $row['edit'] = $edit_link->render();
    $row['delete'] = $delete_btn->render();
    $table['tbody'][] = $row;
}

$table_template = new Core\Views\Table($table);
$nav_template = new App\Views\Nav();

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css"/>
    <title></title>
    <style>
    </style>
</head>
<body>
<?php print $nav_template->render() ?>
<main>
    <?php print $table_template->render(); ?>
</main>
</body>
</html>
