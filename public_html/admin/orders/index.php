<?php

require '../../../bootloader.php';

$table = [
    'thead' => [
        '#',
        'Status',
        'Vardas',
        'Pavarde',
        'Price',
        'Date',
        'Action',
    ],
    'tbody' => []
];

if (!\App\App::$session->userIs(\App\Users\User::ROLE_ADMIN)) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

$orders = \App\Cart\Orders\Model::getWhere([
]);

$number = 1;

foreach ($orders as $order) {

    $link = new \Core\Views\Link([
        'url' => '/admin/orders/views.php?id=' . $order->getId(),
        'title' => 'View order',
        'attr' => [
            'class' => 'view_order'
        ]
    ]);

    $row = [
        'number' => $order->getId(),
        'status' => $order->_getStatusName(),
        'name' => $order->user()->getName(),
        'surname' => $order->user()->getSurname(),
        'price' => $order->getPrice(),
        'date' => $order->getDate(),
        'action' => $link->render()
    ];
    $table['tbody'][] = $row;
}

$table_template = new Core\Views\Table($table);
$nav_template = new App\Views\Nav();

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css"/>
    <title>Orders</title>
</head>
<body>
<?php print $nav_template->render() ?>
<main>
    <?php print $table_template->render(); ?>
</main>
</body>
</html>
