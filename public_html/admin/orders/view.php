<?php

require '../../../bootloader.php';

$id = $_GET['id'] ?? null;

if ($id !== null) {
    if (strlen($id) > 0) {
        $order = \App\Cart\Orders\Model::get((int)$id);
    }
    if (!($order ?? null)) {
        header('Location: http://phpsualum.lt/admin/views.php');
    }
}

if (!\App\App::$session->userIs(\App\Users\User::ROLE_ADMIN)) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

function form_success($form, array $safe_input): void
{
    $order = \App\Cart\Orders\Model::get($safe_input['order_id']);
    $order->setStatus($safe_input['order_status']);
    \App\Cart\Orders\Model::update($order);

    header("Location: /admin/orders/index.php");
}

$form = [
    'attr' => [
        'id' => 'select'
    ],
    'fields' => [
        'order_id' => [
            'type' => 'hidden',
            'value' => $order->getId(),
        ],
        'order_status' => [
            'label' => 'Choose action: ',
            'value' => '',
            'type' => 'select',
            'validate' => [
                'validate_not_empty',
            ],
            'option' => [
                \App\Cart\Orders\Order::STATUS_SUBMITTED => 'Submitted',
                \App\Cart\Orders\Order::STATUS_SHIPPED => 'Shipped',
                \App\Cart\Orders\Order::STATUS_DELIVERED => 'Delivered',
                \App\Cart\Orders\Order::STATUS_CANCELED => 'Canceled',
            ],
            'extra' => [
                'attr' => [
                ]
            ]
        ],
    ],
    'buttons' => [
        'button' => [
            'type' => 'submit',
            'title' => 'Update',
            'extra' => [
                'attr' => [

                ]
            ]
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
//        'failed' => 'form_failed'
    ],
    'validators' => []
];


$table = [
    'thead' => [
        '#',
        'Product',
        'Price'
    ],
    'tbody' => []
];

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
};

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

$order_title = 'Order #' . $order->getId();
$total_price = 'Total: ' . $order->getPrice() . ' Eur';

$name = 'Name: ' . $order->user()->getName();
$surname = 'Surname: ' . $order->user()->getSurname();

$form_template = new \Core\Views\Form($form);
$table_template = new Core\Views\Table($table);
$nav_template = new App\Views\Nav();

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css"/>
    <title><?php print $order_title ?>></title>
</head>
<body>
<?php print $nav_template->render() ?>
<main>
    <h1><?php print $order_title ?></h1>
    <h2><?php print $name ?></h2>
    <h2><?php print $surname ?></h2>
    <?php print $table_template->render(); ?>
    <?php print $form_template->render(); ?>
</main>
</body>
</html>
