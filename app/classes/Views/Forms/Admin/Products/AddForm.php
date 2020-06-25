<?php

namespace App\Views\Forms\Admin\Products;

use Core\Views\Form;

class AddForm extends Form
{
    public function __construct(array $form = [])
    {
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
            ],
        ];
        parent::__construct($form);
    }
}