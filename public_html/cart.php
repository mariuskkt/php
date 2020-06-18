<?php

require '../bootloader.php';


function delete_success($delete_form, $safe_input)
{
    \App\Cart\Items\Model::deletebyId($safe_input['id']);
}

function order_success($order_form, $safe_input)
{
//    pagal session user_id ir itemo statusa istraukiam masyva itemu
    $items = \App\Cart\Items\Model::getWhere(['user_id' => App\App::$session->getUser()->getId(),
        'status' => \App\Cart\Items\Item::STATUS_IN_CART]);

    $order = new \App\Cart\Orders\Order([
        'date' => date("Y-M-d H:i"),
    ]);
//    insertinant orderi gaunam order id,
//    nes padarem, kad orders model returnintu insert row,o insert row returnina row id,
//    kuri priskiriam order_id
    $order_id = \App\Cart\Orders\Model::insert($order);
    $order->setId($order_id);
    $order->setUserId(App\App::$session->getUser()->getId());

    $sum = 0;

//    kiekvienam itemui is masyvo pakeiciam statusa i ordered ir updatinam db, tiap pat suskaiciuojam bendra orderio kaina
//    naudojant drink ir get price metodus is item
    foreach ($items as $item) {
        $item->setStatus(\App\Cart\Items\Item::STATUS_ORDERED);
        $item->setOrderId($order_id);
        \App\Cart\Items\Model::update($item);

        $sum += $item->drink()->getPrice();
    }

    $order->setPrice($sum);
    $order->setStatus(\App\Cart\Orders\Order::STATUS_SUBMITTED);
    \App\Cart\Orders\Model::update($order);

    header("Location: /orders/index.php");
}

$table = [
    'thead' => [
        '#',
        'Product',
        'Price',
        'Action',
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
        'delete' => [
            'type' => 'submit',
            'title' => 'Delete'
        ]
    ],
    'callbacks' => [
        'success' => 'delete_success',
    ]
];

$order_form = [
    'attr' => [
        'class' => 'order_form',
//        'value' => 'order'
    ],
    'fields' => [
        'id' => [
            'type' => 'hidden',
            'value' => 'order'
        ],
    ],
    'buttons' => [
        'order' => [
            'type' => 'submit',
            'title' => 'Order'
        ]
    ],
    'callbacks' => [
        'success' => 'order_success',
    ]
];

//tikrinu formos action is post masyvo ir validuoju forma
if ($_POST) {
    if (get_form_action() == 'delete') {
        $safe_input = get_filtered_input($delete_form);
        validate_form($delete_form, $safe_input);
    } elseif (get_form_action() == 'order') {
        $safe_input = get_filtered_input($order_form);
        validate_form($order_form, $safe_input);
    }

};

$logged_in = App\App::$session->getUser();
$cart_items = \App\Cart\Items\Model::getWhere([
    'user_id' => $logged_in->getId(),
    'status' => \App\Cart\Items\Item::STATUS_IN_CART
]);
$number = 1;

foreach ($cart_items as $index => $cart_item) {
    $delete_form['fields']['id']['value'] = $cart_item->getId();
    $delete_btn = new \Core\Views\Form($delete_form);
    $row = [
        'number' => $number,
        'name' => $cart_item->drink()->getName(),
        'price' => $cart_item->drink()->getPrice(),
        'delete' => $delete_btn->render()
    ];

    $table['tbody'][] = $row;
    $number++;
}

$order_btn = new \Core\Views\Form($order_form);
$table_template = new Core\Views\Table($table);
$nav_template = new App\Views\Nav();

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <title></title>
    <style>
    </style>
</head>
<body>
<?php print $nav_template->render() ?>
<main>
    <?php print $table_template->render(); ?>
    <?php print $order_btn->render(); ?>
</main>
</body>
</html>
