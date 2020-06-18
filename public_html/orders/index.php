<?php

require '../../bootloader.php';

$table = [
    'thead' => [
        '#',
        'Status',
        'Date',
        'Price',
        'Action',
    ],
    'tbody' => []
];

if (!\App\App::$session->userIs(\App\Users\User::ROLE_USER)) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

$orders = \App\Cart\Orders\Model::getWhere([
    'user_id' => \App\App::$session->getUser()->getId(),
]);

$number = 1;

foreach ($orders as $order) {

    $link = new \Core\Views\Link([
        'url' => '/orders/views.php?id=' . $order->getId(),
        'title' => 'View order',
        'attr' => [
            'class' => 'view_order'
        ]
    ]);

    $row = [
        'number' => $number,
        'status' => $order->_getStatusName(),
        'date' => $order->getDate(),
        'price' => $order->getPrice(),
        'action' => $link->render()
    ];

    $table['tbody'][] = $row;

    $number++;
}

$table_template = new Core\Views\Table($table);
$nav_template = new App\Views\Nav();

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
    <title>Orders</title>
</head>
<body>
<?php print $nav_template->render() ?>
<main>
    <?php print $table_template->render(); ?>
</main>
</body>
</html>
