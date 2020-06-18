<?php

require '../bootloader.php';

function cart_success($cart_form, $safe_input)
{
    $logged_in = App\App::$session->getUser();
    $cart = [
        'drinkId' => $safe_input['id'],
        'userId' => $logged_in->id
    ];
    $item = new \App\Cart\Items\Item($cart);
    $item->setStatus(\App\Cart\Items\Item::STATUS_IN_CART);
    \App\Cart\Items\Model::insert($item);
}

$cart_form = [
    'attr' => [
        'class' => 'cart_form'
    ],
    'fields' => [
        'id' => [
            'type' => 'hidden',
            'value' => ''
        ],
    ],
    'buttons' => [
        'button' => [
            'type' => 'submit',
            'title' => 'Order'
        ]
    ],
    'callbacks' => [
        'success' => 'cart_success',
    ]
];

if ($_POST) {
    $safe_input = get_filtered_input($cart_form);
    validate_form($cart_form, $safe_input);
};

$drinks = \App\Drinks\Model::getWhere([]);
$data = [];

foreach ($drinks as $drink_index => $drink) {
    $cart_form['fields']['id']['value'] = $drink->getId();
    $cart_btn = new \Core\Views\Form($cart_form);
    $item = [
        'data' => $drink,
    ];

    if (\App\App::$session->userIs(\App\Users\User::ROLE_USER)) {
        $item['form'] = $cart_btn->render();
    }

    $data[] = $item;
}

$catalog_template = new Core\Views\Catalog($data);
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
    <h1>Who let the dogs out: </h1>
    <?php print $catalog_template->render() ?>
</main>
</body>
</html>

