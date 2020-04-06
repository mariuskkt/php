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
    $file_name = DB_FILE;
    $data = file_to_array($file_name);
    $data = $data ? $data : [];
    $data[] = [
        'question_1' => $safe_input['question_1'],
        'question_2' => $safe_input['question_2'],
        'question_3' => $safe_input['question_3']
    ];
    array_to_file($data, $file_name);

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


$form = [
    'attr' => [
        'action' => 'index.php',
        'method' => 'POST',
        'class' => 'my-form',
        'id' => 'form-id'
    ],
    'fields' => [
//        'user_name' => [
//            'label' => 'User name ',
//            'type' => 'text',
//            'value' => '',
//            'validate' => [
//                'validate_not_empty',
//                'validate_text_length' => [
//                    'min' => 2,
//                    'max' => 6
//                ]
//            ],
//            'extra' => [
//                'attr' => [
//                    'class' => 'red',
//                    'id' => 'first-name',
//                ]
//            ]
//        ],
//        'password' => [
//            'label' => 'Password ',
//            'type' => 'text',
//            'value' => '',
//            'validate' => [
//                'validate_not_empty',
//                'validate_text_length' => [
//                    'min' => 2,
//                    'max' => 6
//                ]
//            ],
//            'extra' => [
//
//                'attr' => [
//                    'class' => 'red',
//                    'id' => 'first-name',
//                ]
//            ]
//        ],
//        'repeat_password' => [
//            'label' => 'Repeat password ',
//            'type' => 'text',
//            'value' => '',
//            'validate' => [
//                'validate_not_empty',
//                'validate_text_length' => [
//                    'min' => 2,
//                    'max' => 10
//                ]
//            ],
//            'extra' => [
//
//                'attr' => [
//                    'class' => 'red',
//                    'id' => 'first-name',
//                    'step' => 'any'
//                ]
//            ]
//        ],
        'question_1' => [
            'type' => 'radio',
            'label' => 'Ar laikai kardana?',
            'validate' => [
                'validate_not_empty'
            ],
            'options' => [
                'taip' => 'Taip',
                'ne' => 'Ne'
            ],
            'extra' => [
                'attr' => [

                ]
            ]
        ],
        'question_2' => [
            'type' => 'radio',
            'label' => 'Ar pili į baką?',
            'validate' => [
                'validate_not_empty'
            ],
            'options' => [
                'taip' => 'Taip',
                'ne' => 'Ne'
            ],
            'extra' => [
                'attr' => [

                ]
            ]
        ],
        'question_3' => [
            'type' => 'radio',
            'label' => 'Ar rūkai žolelių arbatą?',
            'validate' => [
                'validate_not_empty'
            ],
            'options' => [
                'taip' => 'Taip',
                'ne' => 'Ne'
            ],
            'extra' => [
                'attr' => [

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
//            'type' => 'radio',
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
            'title' => 'Žiūrėti statiska',
            'extra' => [
                'attr' => [

                ]
            ]
        ]
    ],
//    'validators' => [
//        'validate_fields_match' => [
//            'password',
//            'repeat_password'
//        ]
//    ],
    'callbacks' => [
        'success' => 'form_success',
        'failed' => 'form_failed'
    ]
];


if ($_POST) {
    $safe_input = get_filtered_input($form);
    validate_form($form, $safe_input);
    var_dump($safe_input);
}

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
    <form method="post">
        <?php include 'core/templates/form.tpl.php' ?>
    </form>
</main>
</body>
</html>

