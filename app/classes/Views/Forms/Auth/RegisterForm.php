<?php

namespace App\Views\Forms\Auth;

use Core\Views\Form;

class RegisterForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'fields' => [
                'username' => [
                    'label' => 'User name: ',
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
                'name' => [
                    'label' => 'Name: ',
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
                'surname' => [
                    'label' => 'Last name: ',
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
                'email' => [
                    'label' => 'Your email: ',
                    'type' => 'email',
                    'value' => '',
                    'validate' => [
                        'validate_not_empty',
                        'validate_email_unique',
                        'validate_email'
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
                    ],
                    'extra' => [

                        'attr' => [
                            'class' => 'red',
                            'id' => 'first-name',
                        ]
                    ]
                ],
                'repeat_password' => [
                    'label' => 'Repeat password: ',
                    'type' => 'text',
                    'value' => '',
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'extra' => [

                        'attr' => [
                            'class' => 'red',
                            'id' => 'first-name',
                            'step' => 'any'
                        ]
                    ]
                ],
            ],
            'buttons' => [
                'button' => [
                    'name' => 'action',
                    'type' => 'submit',
                    'title' => 'Register',
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
                ],
            ],
        ];

        parent::__construct($form);
    }
}