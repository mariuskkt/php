<?php

namespace App\Views\Forms\Auth;

use Core\Views\Form;

class LoginForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'fields' => [
                'email' => [
                    'label' => 'Your email: ',
                    'type' => 'email',
                    'value' => '',
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
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
                    ],
                    'extra' => [

                        'attr' => [
                            'id' => 'first-name',
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Join',
                ]
            ],
            'validators' => [
                'validate_login'
            ]
        ];

        parent::__construct($form);
    }
}