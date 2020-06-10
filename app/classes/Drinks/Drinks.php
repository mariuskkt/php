<?php

namespace App\Drinks;

use Core\DataHolder;
use Exception;

class Drinks extends DataHolder
{
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
     * sets name in data array
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * gets name from data array
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name ?? null;
    }


    /**
     * sets percentage in data array
     * @param int $percentage
     * @return void
     */
    public function setPercentage(int $percentage): void
    {
        $this->percentage = $percentage;
    }

    /**
     * gets percentage from data array
     * @return int|null
     */
    public function getPercentage(): ?int
    {
        return $this->percentage ?? null;
    }


    /**
     * sets volume in data array
     * @param int $volume
     * @return void
     */
    public function setVolume(int $volume): void
    {
        $this->volume = $volume;
    }

    /**
     * gets volume from data array
     * @return int|null
     */
    public function getVolume(): ?int
    {
        return $this->volume ?? null;
    }

    /**
     * sets amount in data array
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * gets amount from data
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount ?? null;
    }

    /**
     * sets amount in data array
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * gets amount from data
     * @return int|null
     */
    public function getPrice(): ?int
    {
        return $this->price ?? null;
    }


    /**
     * sets id
     * @param $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * gets photo
     * @return mixed|null
     */
    public function getPhoto()
    {
        return $this->photo ?? null;
    }
}