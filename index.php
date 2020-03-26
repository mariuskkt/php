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
            'value' => '',
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


/**
 * returns filtered inputs
 * @param array $form
 * @return array|null or array
 */
function get_filtered_input(array $form): ?array
{
    $filter_params = [];

    foreach ($form['fields'] as $field_index => $field_value) {
        $filter_params[$field_index] = FILTER_SANITIZE_SPECIAL_CHARS;
    };

    return filter_input_array(INPUT_POST, $filter_params);
}

$safe_input = get_filtered_input($form);

var_dump($safe_input);
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
    <h1>Hack it!</h1>
    <h2><?php print $safe_input['first_name'] ?? ''; ?></h2>
    <h2><?php print $safe_input['password'] ?? ''; ?></h2>
    <form method="post">
        <?php include 'templates/form.tpl.php'?>
    </form>
</main>
</body>
</html>

