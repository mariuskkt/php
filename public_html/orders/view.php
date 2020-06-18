<?php

require '../../bootloader.php';

$id = $_GET['id'] ?? null;

if ($id !== null) {
    if (strlen($id) > 0) {
        $order = \App\Cart\Orders\Model::get((int)$id);
    }
    if (!($order ?? null)) {
        header('Location: http://phpsualum.lt/admin/views.php');
    }
}

if (!\App\App::$session->userIs(\App\Users\User::ROLE_USER)
    || ($order->getUserId() != App\App::$session->getUser()->getId())) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

$table = [
    'thead' => [
        '#',
        'Name',
        'Price'
    ],
    'tbody' => []
];

$drinks = \App\Cart\Items\Model::getWhere([
    'user_id' => $order->getUserId(),
    'order_id' => $order->getId()
]);

$number = 1;

foreach ($drinks as $drink) {
    $row = [
        'number' => $number,
        'name' => $drink->drink()->getName(),
        'price' => $drink->drink()->getPrice()

    ];
    $table['tbody'][] = $row;

    $number++;
}

$order_title = 'Your order #' . $order->getId();
$status_title = 'Order status: ' . $order->_getStatusName();
$total_price = 'Total: ' . $order->getPrice() . ' Eur';

$table_template = new Core\Views\Table($table);
$nav_template = new App\Views\Nav();

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
    <title><?php print $order_title; ?></title>
</head>
<body>
<?php print $nav_template->render(); ?>
<main>
    <h1><?php print $order_title; ?></h1>
    <?php print $table_template->render(); ?>
    <h4><?php print $status_title?></h4>
    <h2><?php print $total_price; ?></h2>
</main>
</body>
</html>
