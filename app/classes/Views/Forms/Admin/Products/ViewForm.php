<?php


namespace App\Views\Forms\Admin\Products;


use Core\Views\Form;

class ViewForm extends Form
{
    public function __construct(array $form = [])
    {
        $form = [
            'attr' => [
                'class' => 'delete_form'
            ],
            'fields' => [
                'id' => [
                    'type' => 'hidden',
                    'value' => ''
                ],
            ],
            'buttons' => [
                'delete' => [
                    'name' => 'action',
                    'title' => 'Delete'
                ]
            ],
        ];

        parent::__construct($form);
    }

    public function setId(int $drink_id)
    {
        $this->data['fields']['id']['value'] = $drink_id;
    }
}