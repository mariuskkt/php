<?php

namespace App\Pixels;

use Exception;

class Pixel
{
    /**
     * @var
     */
    private $data;

    /**
     * Pixel constructor.
     * @param array|null $data
     * @throws Exception
     */
    public function __construct(array $data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    /**
     * sets x in data array
     * @param int $x
     */
    public function setX(int $x): void
    {
        $this->data['x'] = $x;
    }

    /**
     * gets x from data array
     * @return int|null
     */
    public function getX(): ?int
    {
        return $this->data['x'] ?? null;
    }


    /**
     * sets y in data array
     * @param int $y
     * @return int
     */
    public function setY(int $y): void
    {
        $this->data['y'] = $y;
    }

    /**
     * gets y from data array
     * @return int|null
     */
    public function getY(): ?int
    {
        return $this->data['y'] ?? null;
    }


    /**
     * sets color in data array
     * @param string $color
     * @return string
     */
    public function setColor(string $color): void
    {
        $this->data['color'] = $color;
    }

    /**
     * gets color from data array
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->data['color'] ?? null;
    }

    /**
     * sets email in data array
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->data['email'] = $email;
    }

    /**
     * gets email from data
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->data['email'] ?? null;
    }

    /**
     * sets data from array
     * @param array $data
     * @throws Exception
     */
    public function setData(array $data): void
    {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'x':
                    $this->setX($value);
                    break;
                case 'y':
                    $this->setY($value);
                    break;
                case 'color':
                    $this->setColor($value);
                    break;
                case 'email':
                    $this->setEmail($value);
                    break;
                default:
                    throw new Exception("tokio indexo $key nera loxas");
            }
        }
//        if (isset($data['x'])) {
//            $this->setX($data['x']);
//        }
//        if (isset($data['y'])) {
//            $this->setX($data['y']);
//        }
//        if (isset($data['color'])) {
//            $this->setX($data['color']);
//        }
//        if (isset($data['email'])) {
//            $this->setX($data['email']);
//        }
    }

    /**
     * returns results array from data
     * @return array
     */
    public function getData(): array
    {
        return [
            'x' => $this->getX(),
            'y' => $this->getY(),
            'color' => $this->getColor(),
            'email' => $this->getEmail()
        ];
    }
}