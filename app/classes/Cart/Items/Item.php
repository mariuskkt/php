<?php

namespace App\Cart\Items;

use App\Cart\Orders\Order;
use App\Drinks\Drink;
use App\Users\User;
use Core\DataHolder;


class Item extends DataHolder
{
    const STATUS_IN_CART = 0;
    const STATUS_ORDERED = 1;

    /**
     * sets id
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * gets id
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id ?? null;
    }

    /**
     * sets drinkId in data array
     * @param string $name
     */
    public function setDrinkId(int $name): void
    {
        $this->drinkId = $name;
    }

    /**
     * gets drinkId from data array
     * @return string|null
     */
    public function getDrinkId(): ?int
    {
        return $this->drinkId ?? null;
    }

    /**
     * sets user id in data array
     * @param int $name
     */
    public function setUserId(int $name): void
    {
        $this->userId = $name;
    }

    /**
     * gets user id from data array
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId ?? null;
    }

    /**
     * sets user id in data array
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * gets user id from data array
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status ?? null;
    }

    /**
     * sets user id in data array
     * @param int $id
     */
    public function setOrderId(?int $id): void
    {
        $this->order_id = $id;
    }

    /**
     * gets user id from data array
     * @return int|null
     */
    public function getOrderId()
    {
        return $this->order_id ?? null;
    }


    /**
     * gets drink by its id
     * @return Drink|null
     */
    public function drink(): Drink
    {
        return \App\Drinks\Model::get($this->getDrinkId());
    }

    /**
     * gets user by its id
     * @return User|null
     */
    public function user(): User
    {
        return \App\Users\Model::get($this->getUserId());
    }

    /**
     * gets order by order id
     * @return Order
     */
    public function order(): Order
    {
        \App\Cart\Orders\Model::get($this->getOrderedId());
    }
}