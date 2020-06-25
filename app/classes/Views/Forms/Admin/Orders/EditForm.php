<?php

namespace App\Views\Forms\Admin\Orders;

use Core\Views\Form;

class EditForm extends Form
{
    public function __construct(array $form =[])
    {
        $id = $_GET['id'] ?? null;
        $order = \App\Cart\Orders\Model::get((int)$id);

        $form = [
            'attr' => [
                'id' => 'select'
            ],
            'fields' => [
                'order_id' => [
                    'type' => 'hidden',
                    'value' => $order->getId(),
                ],
                'order_status' => [
                    'label' => 'Choose action: ',
                    'value' => '',
                    'type' => 'select',
                    'validate' => [
                        'validate_not_empty',
                    ],
                    'option' => [
                        \App\Cart\Orders\Order::STATUS_SUBMITTED => 'Submitted',
                        \App\Cart\Orders\Order::STATUS_SHIPPED => 'Shipped',
                        \App\Cart\Orders\Order::STATUS_DELIVERED => 'Delivered',
                        \App\Cart\Orders\Order::STATUS_CANCELED => 'Canceled',
                    ],
                    'extra' => [
                        'attr' => [
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