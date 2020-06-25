<?php

namespace App\Views\Forms\Admin\Products;

use App\Drinks\Model;
use Core\Views\Form;

class EditForm extends Form
{
    public function __construct(array $form = [])
    {
        $id = $_GET['id'] ?? null;
        $drink = Model::get((int)$id);

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
            'validators' => []
        ];
        parent::__construct($form);
    }
}