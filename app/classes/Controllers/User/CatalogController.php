<?php

namespace App\Controllers\User;

use App\Cart\Items\Item;
use App\Controllers\BaseController;
use Core\Views\Catalog;

class CatalogController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Catalog');
        $this->page->addStyle('../../assets/css/style.css');
    }
    public function index(): ?string
    {
        $user = \App\App::$session->getUser();

        $drinks = \App\Drinks\Model::getWhere([]);
        $data = [];

        foreach ($drinks as $drink_index => $drink) {

            $item = [
                'data' => $drink,
            ];
            $form = new \App\Views\Forms\Catalog\AddToCartForm();

            if (\App\App::$session->userIs(\App\Users\User::ROLE_USER)) {
                $form->setDrinkId($drink->id);
                $item['form'] = $form->render();
            }
            $data[] = $item;
        }

        if ($form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();

            $cart = [
                'drinkId' => $safe_input['id'],
                'userId' => $user->id
            ];
            var_dump($cart);
            $item = new Item($cart);
            $item->setStatus(\App\Cart\Items\Item::STATUS_IN_CART);
            \App\Cart\Items\Model::insert($item);
        }
        $catalog = new Catalog($data);
        $content = new \App\Views\Content([
            'form' => $form->render(),
            'catalog' => $catalog->render(),
            'h1' => 'Who let the dogs out:'
        ]);
        $this->page->setContent($content->render('catalog/add_to_cart.tpl.php'));

        return $this->page->render();
    }
}