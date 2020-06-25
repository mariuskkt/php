<?php

namespace App\Views\Forms\Catalog;

use Core\Views\Form;

class AddToCartForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'attr' => [
                'class' => 'cart_form'
            ],
            'fields' => [
                'id' => [
                    'type' => 'hidden',
                    'value' => ''
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Order'
                ]
            ],
        ];

        parent::__construct($form);
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id)
    {
        $this->data['fields']['id']['value'] = $user_id;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->user_id ?? null;
    }

    /**
     * @param int $drink_id
     */
    public function setDrinkId(int $drink_id)
    {
        $this->data['fields']['id']['value'] = $drink_id;
    }

    /**
     * @return int|null
     */
    public function getDrinkId(): ?int
    {
        return $this->drink_id ?? null;
    }
}