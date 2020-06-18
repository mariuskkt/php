<?php

namespace App\Cart\Orders;

use App\Drinks\Drink;
use App\Users\User;
use Core\DataHolder;

class Order extends DataHolder
{

    const STATUS_SUBMITTED = 0;
    const STATUS_SHIPPED = 1;
    const STATUS_DELIVERED = 2;
    const STATUS_CANCELED = 3;

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
     * sets date in data array
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * gets date from data array
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date ?? null;
    }

    /**
     * sets price in data array
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * gets price from data array
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price ?? null;
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
     * gets user by its id
     * @return User|null
     */
    public function user(): User
    {
        return \App\Users\Model::get($this->getUserId());
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

    /**writes status name by status const from db
     * @param int|null $status
     * @return int|string|null
     */
    public function _getStatusName(int $status = null)
    {
        $status = $status ?? $this->getStatus();
        switch ($status) {
            case self::STATUS_SUBMITTED:
                $status = 'Submitted';
                break;
            case self::STATUS_SHIPPED:
                $status = 'Shipped';
                break;
            case self::STATUS_DELIVERED:
                $status = 'Delivered';
                break;
            case self::STATUS_CANCELED:
                $status = 'Canceled';
                break;
        }
        return $status;
    }
}