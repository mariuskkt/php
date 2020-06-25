<?php

namespace App\Views\Forms\User;

use Core\Views\Form;

class CartOrderForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'attr' => [
                'class' => 'order_form',
            ],
            'fields' => [
                'id' => [
                    'type' => 'hidden',
                    'value' => ''
                ],
            ],
            'buttons' => [
                'order' => [
                    'type' => 'submit',
                    'title' => 'Order'
                ]
            ]
        ];

        parent::__construct($form);
    }

//    public function setId(int $drink_id)
//    {
//        $this->data['fields']['id']['value'] = $drink_id;
//    }
}