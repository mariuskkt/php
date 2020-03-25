<?php

/**
 * converts $array['attr'] to string
 * @param array $array
 * @return string
 */
function form_attr(array $array): string
{
    $text = '';
    foreach ($array as $index => $value) {
        $text .= $index . '=' . '"' . $value . '"' . ' ';

    }
    return $text;
}

$form = [
    'attr' => [
        'action' => 'index.php',
//        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'form-id'
    ],
    'fields' => [
        'first_name' => [
            'label' => 'First name',
            'type' => 'text',
            'value' => 'Piotras',
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name'
                ]
            ]
        ],
        'password' => [
            'label' => 'Password',
            'type' => 'password',
            'value' => '',
            'extra' => [
                'attr' => [
                    'class' => 'green',
                    'id' => 'pass'
                ]
            ]
        ],
        'text' => [
            'label' => 'Type something',
            'type' => 'textarea',
            'value' => '',
            'extra' => [
                'attr' => [

                ]
            ]
        ],
//        'sex' => [
//            [
//                'label' => 'Male:',
//                'type' => 'radio',
//                'value' => 'male'
//            ],
//            [
//
//                'label' => 'Female:',
//                'type' => 'radio',
//                'value' => 'female'
//            ]
//
//        ],
        'cars' => [
            'type' => 'select',
            'label' => '',
            'value' => 'vw',
            'option' => [
                'volvo' => 'VOLVO',
                'vw' => 'Volkswagen',
                'mersedes-benz' => 'Mercedes-Benz'
            ],
            'extra' => [
                'attr' => [

                ]
            ]
        ]
    ],
    'buttons' => [
        'button' => [
            'name' => 'action',
            'type' => 'submit',
            'title' => 'SUBMIT',
            'extra' => [
                'attr' => [

                ]
            ]
        ]
    ]
];

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
<main>
    <?php include 'templates/form.tpl.php'; ?>
</main>
</body>
</html>

