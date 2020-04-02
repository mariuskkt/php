<?php

require 'bootloader.php';

/**
 * if fields are filled in correctly
 * @param $form
 * @param $safe_input
 * @throws Exception
 */
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
//    if (sqrt($safe_input['pirmas']) == $safe_input['antras']) {
//        var_dump('Geras atsakymas');
//    } else {
//        $paklaida = sqrt($safe_input['pirmas']) - $safe_input['antras'];
//        if ($paklaida < 0) {
//            var_dump('Saknies neatspejai, suklydai per ' . ($paklaida * -1) . ' per daug');
//        } else {
//            var_dump('Saknies neatspejai, suklydai per ' . $paklaida . ' per mazai');
//
//        }
//
//    }
//    var_dump('Viskas ok su tavim');

    $file_name = DB_FILE;
    array_to_file($safe_input, $file_name);

}

/**
 * if fields are filled in not correctly
 * @param $form
 * @param $safe_input
 * @throws Exception
 */
function form_failed($form, $safe_input)
{
    var_dump('Eik NX');
}


var_dump(file_to_array(DB_FILE));

$saknis = rand(4, 100);

$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'form-id'
    ],
    'fields' => [
        'User_name' => [
            'label' => 'User name: ',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_text_length' => [
                    'min' => 2,
                    'max' => 6
                ]
            ],
            'extra' => [
                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name',
                ]
            ]
        ],
        'password' => [
            'label' => 'Password: ',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_text_length' => [
                    'min' => 2,
                    'max' => 6
                ]
            ],
            'extra' => [

                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name',
                ]
            ]
        ],
        'repeat_password' => [
            'label' => 'Repeat assword: ',
            'type' => 'text',
            'value' => '',
            'validate' => [
                'validate_not_empty',
                'validate_text_length' => [
                    'min' => 2,
                    'max' => 10
                ]
            ],
            'extra' => [

                'attr' => [
                    'class' => 'red',
                    'id' => 'first-name',
                    'step' => 'any'
                ]
            ]
        ],
//        'telefonas' => [
//            'label' => 'Phone: ',
//            'type' => 'text',
//            'value' => '',
//            'validate' => [
//                'validate_not_empty',
//                'validate_is_number',
//                'validate_phone',
//                'validate_text_length'=>[
//                    'min' => 2,
//                    'max' => 20
//                ]
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'red',
//                    'id' => 'first-name'
//                ]
//            ]
//        ],
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
            'password',
            'repeat_password'
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

//if (file_exists($file_name)){
//    print 'File exists';
//    return true;
//}else{
//    print 'Damn. No such file.';
//}


//array_to_file($safe_input, $file_name);

//var_dump($_POST);
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
    <h1>Registration</h1>
    <h2><?php print $safe_input['first_name'] ?? ''; ?></h2>
    <h2><?php print $safe_input['password'] ?? ''; ?></h2>
    <form method="post">
        <?php include 'core/templates/form.tpl.php' ?>
    </form>
</main>
</body>
</html>

