<?php

namespace App\Controllers\Admin;

use App\App;
use App\Controllers\BaseController;
use App\Drinks\Drink;
use App\Users\User;
use App\Views\Content;
use App\Views\Forms\Admin\Products\AddForm;
use Core\Views\Table;

class ProductsController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        if (!App::$session->userIs(User::ROLE_ADMIN)) {
            header('HTTP/1.1 401 Unauthorized');
            exit;
        }
        $this->page->setTitle('Admin');
        $this->page->addStyle('../../assets/css/style.css');
    }

    public function index(): ?string
    {
        $form = new \App\Views\Forms\Admin\Products\ViewForm();
        if ($form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();
            \App\Drinks\Model::deletebyId($safe_input['id']);
        }

        $table = [
            'thead' => [
                'id',
                'name',
                'percentage',
                'volume',
                'amount',
                'price',
                'Edit',
                'Delete'
            ],
            'tbody' => []
        ];

        $drinks = \App\Drinks\Model::getWhere([]);

        foreach ($drinks as $drink) {

            $edit_link = new \Core\Views\Link([
                'url' => '/admin/products/edit?id=' . $drink->getId(),
                'title' => 'Edit',
                'attr' => [
                    'class' => 'btn_edit'
                ]
            ]);

            $row = $drink->_getData();
            unset($row['photo']);
            $form->setId($drink->getId());
            $row['edit'] = $edit_link->render();
            $row['delete'] = $form->render();
            $table['tbody'][] = $row;
        }
        $content = new Content([
            'h1' => 'Drinks: ',
            'table' =>  (new Table($table))->render(),
        ]);

        $this->page->setContent($content->render('admin/products/view.tpl.php'));
        return $this->page->render();
    }

    public function create()
    {
        $form = new AddForm();

        if ($form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();
            \App\Drinks\Model::insert(new Drink($safe_input));
            header("Location: /index");
        }
        $content = new Content([
            'form' => $form->render(),
        ]);

        $this->page->setContent($content->render('admin/products/AddForm.tpl.php'));

        return $this->page->render();
    }

    public function edit()
    {
        $form = new \App\Views\Forms\Admin\Products\EditForm();

        $id = $_GET['id'] ?? null;

        if ($id !== null) {
            if (strlen($id) > 0) {
                $drink = \App\Drinks\Model::get((int)$id);
            }
            if (!($drink ?? null)) {
                header('Location: http://phpsualum.lt/admin/orders/views.php');
            }
        }

        if ($form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();
            $safe_input['id'] = $_GET['id'];
            \App\Drinks\Model::update(new Drink($safe_input));
            header("Location: /admin/products/view.php");
        }

        $content = new \App\Views\Content([
            'form' => $form->render(),
        ]);

        $this->page->setContent($content->render('admin/products/edit_form.tpl.php'));
        return $this->page->render();
    }
}