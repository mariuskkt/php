<?php

namespace App\Controllers\User;

use App\App;
use App\Cart\Orders\Order;
use App\Controllers\BaseController;
use App\Views\Content;
use App\Views\Forms\User\CartDeleteForm;
use App\Views\Forms\User\CartOrderForm;
use Core\Views\Table;

class CartController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Your Cart');
        $this->page->addStyle('../../assets/css/style.css');
    }

    public function index(): ?string
    {
        $delete_form = new CartDeleteForm();
        $order_form = new CartOrderForm();
        $table = [
            'thead' => [
                '#',
                'Product',
                'Price',
                'Action',
            ],
            'tbody' => []
        ];
        if ($delete_form->isSubmitted() && $delete_form->validate()) {
            $safe_input = $delete_form->getSubmitData();
            var_dump($safe_input);
            \App\Cart\Items\Model::deletebyId($safe_input['id']);
        }

        if ($order_form->isSubmitted() && $order_form->validate()) {
            $items = \App\Cart\Items\Model::getWhere(['user_id' => App::$session->getUser()->getId(),
                'status' => \App\Cart\Items\Item::STATUS_IN_CART]);

            $order = new Order([
                'date' => date("Y-M-d H:i"),
            ]);

            $order_id = \App\Cart\Orders\Model::insert($order);
            $order->setId($order_id);
            $order->setUserId(App::$session->getUser()->getId());

            $sum = 0;

            foreach ($items as $item) {
                $item->setStatus(\App\Cart\Items\Item::STATUS_ORDERED);
                $item->setOrderId($order_id);
                \App\Cart\Items\Model::update($item);

                $sum += $item->drink()->getPrice();
            }

            $order->setPrice($sum);
            $order->setStatus(Order::STATUS_SUBMITTED);
            \App\Cart\Orders\Model::update($order);

            header("Location: /orders/index.php");
        }


        $logged_in = App::$session->getUser();
        $cart_items = \App\Cart\Items\Model::getWhere([
            'user_id' => $logged_in->getId(),
            'status' => \App\Cart\Items\Item::STATUS_IN_CART
        ]);
        $number = 1;
        if($logged_in){
            foreach ($cart_items as $index => $cart_item) {
                $delete_form->setId($cart_item->getId());
                $row = [
                    'number' => $number,
                    'name' => $cart_item->drink()->getName(),
                    'price' => $cart_item->drink()->getPrice(),
                    'delete' => $delete_form->render()
                ];

                $table['tbody'][] = $row;
                $number++;
            }
        }
        $table_template = new Table($table);

        $content = new  Content([
            'table' => $table_template->render(),
            'form' => $order_form->render()
        ]);
        $this->page->setContent($content->render('user/cart.tpl.php'));

        return $this->page->render();
    }
}
