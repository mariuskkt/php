<?php

require '../../../bootloader.php';

/**
 * if fields are filled in correctly
 * @param $form
 * @param array $safe_input
 * @return void
 * @throws Exception
 */
function form_success($form, array $safe_input): void
{
    $safe_input['id'] = $_GET['id'];
    \App\Drinks\Model::update(new \App\Drinks\Drink($safe_input));
    header("Location: /admin/products/views.php");
}

$id = $_GET['id'] ?? null;

if ($id !== null) {
    if (strlen($id) > 0) {
        $drink = \App\Drinks\Model::get((int)$id);
    }
    if (!($drink ?? null)) {
        header('Location: http://phpsualum.lt/admin/orders/views.php');
    }
}

if (!\App\App::$session->userIs(\App\Users\User::ROLE_ADMIN)) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

$form = [
    'fields' => [
        'name' => [
            'label' => 'Pavadinimas: ',
            'value' => $drink->getName(),
            'type' => 'text',
            'validate' => [
                'validate_not_empty',
            ],
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name',
                ]
            ]
        ],
        'percentage' => [
            'label' => 'Laipsniai: ',
            'type' => 'number',
            'value' => $drink->getPercentage(),
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_field_range' => [
                    'min' => 0,
                    'max' => 50
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name',
                ]
            ]
        ],
        'volume' => [
            'label' => 'Tūris(ml): ',
            'type' => 'number',
            'value' => $drink->getVolume(),
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_is_positive',
                'validate_field_range' => [
                    'min' => 0,
                    'max' => 1000
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'color',
                    'id' => 'color',
                ]
            ]
        ],
        'amount' => [
            'label' => 'Kiekis sandėlyje: ',
            'type' => 'number',
            'value' => $drink->getAmount(),
            'validate' => [

            ],
            'extra' => [
                'attr' => [
                    'class' => 'color',
                    'id' => 'color',
                ]
            ]
        ],
        'price' => [
            'label' => 'Kaina(EUR): ',
            'type' => 'number',
            'value' => $drink->getPrice(),
            'validate' => [

            ],
            'extra' => [
                'attr' => [
                    'class' => 'color',
                    'id' => 'color',
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
    ],
    'validators' => []
];


if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
};
var_dump($_POST);

$form_template = new Core\Views\Form($form);
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
    <div class="form">
        <form method="post">
            <?php print $form_template->render() ?>
        </form>
    </div>
</main>
</body>
</html>
