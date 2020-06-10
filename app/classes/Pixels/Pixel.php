<?php

namespace App\Pixels;

use Core\DataHolder;

class Pixel extends DataHolder
{
    /**
     * sets x in data array
     * @param int $x
     */
    public function setX(int $x): void
    {
        $this->x = $x;
    }

    /**
     * gets x from data array
     * @return int|null
     */
    public function getX(): ?int
    {
        return $this->x ?? null;
    }

    /**
     * sets y in data array
     * @param int $y
     * @return void
     */
    public function setY(int $y): void
    {
        $this->y = $y;
    }

    /**
     * gets y from data array
     * @return int|null
     */
    public function getY(): ?int
    {
        return $this->y ?? null;
    }

    /**
     * sets color in data array
     * @param string $color
     * @return void
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * gets color from data array
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color ?? null;
    }

    /**
     * sets email in data array
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * gets email from data
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email ?? null;
    }

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
}