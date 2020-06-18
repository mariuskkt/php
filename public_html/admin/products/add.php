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
    \App\Drinks\Model::insert(new \App\Drinks\Drink($safe_input));
}

if (!\App\App::$session->userIs(\App\Users\User::ROLE_ADMIN)) {
    header('HTTP/1.1 401 Unauthorized');
    exit;
}

$form = [
    'fields' => [
        'name' => [
            'label' => 'Product name: ',
            'type' => 'text',
            'value' => '',
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
            'label' => 'Percentage: ',
            'type' => 'number',
            'value' => '',
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
            'label' => 'Volume(ml): ',
            'type' => 'number',
            'value' => '',
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
            'label' => 'Quantity in warehouse: ',
            'type' => 'number',
            'value' => '',
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
            'label' => 'Price(EUR): ',
            'type' => 'number',
            'value' => '',
            'validate' => [

            ],
            'extra' => [
                'attr' => [
                    'class' => 'color',
                    'id' => 'color',
                ]
            ]
        ],
        'photo' => [
            'label' => 'Picture(URL:): ',
            'type' => 'text',
            'value' => '',
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
    ],
    'buttons' => [
        'button' => [
            'name' => 'action',
            'type' => 'submit',
            'title' => 'Create',
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

if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
};

$nav_template = new App\Views\Nav();

$form_template = new Core\Views\Form($form);
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
