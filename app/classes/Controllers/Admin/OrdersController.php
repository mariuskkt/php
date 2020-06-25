<?php


namespace App\Controllers\Admin;


use App\Controllers\BaseController;
use App\Views\Content;
use Core\Views\Table;

class OrdersController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Orders');

        if (!\App\App::$session->userIs(\App\Users\User::ROLE_ADMIN)) {
            header('HTTP/1.1 401 Unauthorized');
            exit;
        }

        $this->page->addStyle('../../assets/css/style.css');
    }

    public function index(): ?string
    {
        $table = [
            'thead' => [
                '#',
                'Status',
                'Vardas',
                'Pavarde',
                'Price',
                'Date',
                'Action',
            ],
            'tbody' => []
        ];

        if (!\App\App::$session->userIs(\App\Users\User::ROLE_ADMIN)) {
            header('HTTP/1.1 401 Unauthorized');
            exit;
        }

        $orders = \App\Cart\Orders\Model::getWhere([
        ]);

        $number = 1;

        foreach ($orders as $order) {

            $link = new \Core\Views\Link([
                'url' => '/admin/orders/view.php?id=' . $order->getId(),
                'title' => 'View order',
                'attr' => [
                    'class' => 'view_order'
                ]
            ]);

            $row = [
                'number' => $order->getId(),
                'status' => $order->_getStatusName(),
                'name' => $order->user()->getName(),
                'surname' => $order->user()->getSurname(),
                'price' => $order->getPrice(),
                'date' => $order->getDate(),
                'action' => $link->render()
            ];
            $table['tbody'][] = $row;
        }

        $table_template = new Table($table);
        $content = new Content([
            'table' => $table_template->render()
        ]);

        $this->page->setContent($content->render('admin/orders/orders_index.tpl.php'));
        return $this->page->render();
    }

    public function view(): ?string
    {
        $form = new \App\Views\Forms\Admin\Orders\EditForm();

        $id = $_GET['id'] ?? null;

        if ($id !== null) {
            if (strlen($id) > 0) {
                $order = \App\Cart\Orders\Model::get((int)$id);
            }
            if (!($order ?? null)) {
                header('Location: http://phpsualum.lt/admin/view.php');
            }
        }

        if ($form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();
            $order = \App\Cart\Orders\Model::get($safe_input['order_id']);
            $order->setStatus($safe_input['order_status']);
            \App\Cart\Orders\Model::update($order);
            header("Location: /admin/orders/index.php");
        }


        $table = [
            'thead' => [
                '#',
                'Product',
                'Price'
            ],
            'tbody' => []
        ];

        $drinks = \App\Cart\Items\Model::getWhere([
            'user_id' => $order->getUserId(),
            'order_id' => $order->getId()
        ]);

        $number = 1;

        foreach ($drinks as $drink) {
            $row = [
                'number' => $number,
                'name' => $drink->drink()->getName(),
                'price' => $drink->drink()->getPrice()
            ];
            $table['tbody'][] = $row;

            $number++;
        }
        $table_template = new Table($table);

        $content = new \App\Views\Content([
            'h1' => $order->getId(),
            'h2' => $order->user()->getName(),
            'h3' => $order->user()->getSurname(),
            'table' => $table_template->render(),
            'form' => $form->render(),
        ]);

        $this->page->setContent($content->render('admin/orders/edit_form.tpl.php'));

        return $this->page->render();
    }
}