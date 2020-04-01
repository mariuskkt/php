<?php

require 'bootloader.php';

function form_success($form, $safe_input)
{
//    switch ($safe_input['select']) {
//        case 'atimtis':
//            $result = $safe_input['x'] - $safe_input['y'];
//            break;
//        case 'sudetis':
//            $result = $safe_input['x'] + $safe_input['y'];
//            break;
//        case 'daugyba':
//            $result = $safe_input['x'] * $safe_input['y'];
//            break;
//        default:
//            $result = 0;
//    }
    var_dump('Viskas ok su tavim');
}

function form_failed($form, $safe_input)
{
    var_dump('Confirmed. Adaptas');
}


$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'form-id'
    ],
    'fields' => [
        'pirmas' => [
            'label' => 'Pirmo value: ',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_text_length'=>[
                    'min' => 2,
                    'max' => 10
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name'
                ]
            ]
        ],
        'antras' => [
            'label' => 'Value value: ',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_text_length'=>[
                        'min' => 2,
                        'max' => 10
                ]
            ],
            'extra' => [

                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name'
                ]
            ]
        ],
        'telefonas' => [
            'label' => 'Phone: ',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_is_number',
                'validate_phone',
                'validate_text_length'=>[
                    'min' => 2,
                    'max' => 20
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name'
                ]
            ]
        ],
//        'select' => [
//            'type' => 'select',
//            'label' => 'Pasirinkite veiksma:',
//            'value' => '',
//            'validate' => [
//                'choose_action',
//                'validate_select'
//            ],
//            'option' => [
//                'sudetis' => 'Sudetis',
//                'atimtis' => 'Atimtis',
//                'daugyba' => 'Daugyba'
//            ],
//            'extra' => [
//                'attr' => [
//
//                ]
//            ]
//        ]
    ],
//        'age' => [
//            'label' => 'Your age:',
//            'type' => 'number',
//            'value' => '',
//            'validate' => [
//                'validate_not_empty',
//                'validate_is_number',
//                'validate_is_positive',
//                'validate_max_100',
//                'validate_18_to_100',
//                'validate_field_range' =>
//                    [
//                        'min' => 18,
//                        'max' => 100
//                    ]
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'green',
//                    'id' => 'pass'
//                ]
//            ]
//        ]
//    ],
    'buttons' => [
        'button' => [
            'name' => 'action',
            'type' => 'submit',
            'title' => 'Vaziuojam',
            'extra' => [
                'attr' => [

                ]
            ]
        ]
    ],
    'validators' => [
        'validate_fields_match' => [
            'pirmas',
            'antras'
        ]
    ],
    'callbacks' => [
        'success' => 'form_success',
        'failed' => 'form_failed'
    ]
];


if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);

}

var_dump($_POST);
//var_dump($safe_input);
//var_dump($form['error']);

?>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="app/assets/css/style.css"/>
    <title></title>
    <style>
    </style>
</head>
<body>
<main>
    <h1>Hack it!</h1>
    <h2><?php print $safe_input['first_name'] ?? ''; ?></h2>
    <h2><?php print $safe_input['password'] ?? ''; ?></h2>
    <form method="post">
        <?php include 'core/templates/form.tpl.php' ?>
    </form>
</main>
</body>
</html>

