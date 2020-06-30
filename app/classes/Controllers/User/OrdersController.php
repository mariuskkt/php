<?php

namespace App\Controllers\User;

use App\Cart\Orders\Model;
use App\Controllers\BaseController;
use App\Users\User;
use App\Views\Content;
use Core\Views\Table;

class OrdersController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->page->addStyle('../../assets/css/style.css');

        if (!\App\App::$session->userIs(User::ROLE_USER)) {
            header('HTTP/1.1 401 Unauthorized');
            exit;
        }
    }

    public function index(): ?string
    {
        $orders = Model::getWhere([
            'user_id' => \App\App::$session->getUser()->getId(),
        ]);


        $table = [
            'thead' => [
                '#',
                'Status',
                'Date',
                'Price',
                'Action',
            ],
            'tbody' => []
        ];

        $number = 1;

        foreach ($orders as $order) {

            $link = new \Core\Views\Link([
                'url' => '/orders/view?id=' . $order->getId(),
                'title' => 'View order',
                'attr' => [
                    'class' => 'view_order'
                ]
            ]);

            $row = [
                'number' => $number,
                'status' => $order->_getStatusName(),
                'date' => $order->getDate(),
                'price' => $order->getPrice(),
                'action' => $link->render()
            ];

            $table['tbody'][] = $row;

            $number++;
        }
        $table_template = new Table($table);
        $content = new Content([
            'table' => $table_template->render()
        ]);
        $this->page->setContent($content->render('user/orders_view.tpl.php'));
        return $this->page->render();
    }

    public function view()
    {
        $id = $_GET['id'] ?? null;

        if ($id !== null) {
            if (strlen($id) > 0) {
                $order = Model::get((int)$id);
            }
            if (!($order ?? null)) {
                header('Location: http://phpsualum.lt/admin/views.php');
            }
        }

        if (!\App\App::$session->userIs(User::ROLE_USER)
            || ($order->getUserId() != \App\App::$session->getUser()->getId())) {
            header('HTTP/1.1 401 Unauthorized');
            exit;
        }

        $table = [
            'thead' => [
                '#',
                'Name',
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

        $order_title = 'Your order #' . $order->getId();
        $status_title = 'Order status: ' . $order->_getStatusName();
        $total_price = 'Total: ' . $order->getPrice() . ' Eur';

        $table_template = new Table($table);
        $content = new Content([
            'table' => $table_template->render()
        ]);
        $this->page->setContent($content->render('user/orders_view.tpl.php'));
        return $this->page->render();
    }
}