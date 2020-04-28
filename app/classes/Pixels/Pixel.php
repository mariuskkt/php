<?php

namespace App\Pixels;

use Exception;

class Pixel
{
    /**
     * @var
     */
    private $data;
    private $properties = [
        'x',
        'y',
        'color',
        'email'
    ];

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
     * @return void
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
     * @return void
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
        foreach ($this->properties as $property) {
            if (isset($data[$property])) {
                $method = 'set' . str_replace('_', '', $property);
                $this->{$method}($data[$property]);
            }
        }
    }
//        foreach ($data as $key => $value) {
//            switch ($key) {
//                case 'x':
//                    $this->setX($value);
//                    break;
//                case 'y':
//                    $this->setY($value);
//                    break;
//                case 'color':
//                    $this->setColor($value);
//                    break;
//                case 'email':
//                    $this->setEmail($value);
//                    break;
//                default:
//                    throw new Exception("tokio indexo $key nera loxas");
//            }
//        }
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

    /**
     * returns results array from data
     * @return array
     */
    public function getData(): array
    {
        $results = [];

        foreach ($this->properties as $property) {
            $method = 'get' . str_replace('_', '', $property);

            $results[$property] = $this->{$method}();
        }
        return $results;
    }

    /**
     * Calls out when property is given
     * @param $property_key
     * @param $value
     */
    public function __set($property_key, $value): void
    {
        if ($this->setterExits($property_key)) {
            $method = 'set' . str_replace('_', '', $property_key);

            $this->{$method}($value);
        } else {
            var_dump('such setter doesn\'t exist');
        }
    }

    /**
     * Checks if setter exists
     * @param $property_key
     * @return bool
     */
    private function setterExits($property_key): bool
    {
        $method = 'set' . str_replace('_', '', $property_key);

        if (method_exists($this, $method)) {
            return true;
        }

        return false;
    }

    /**
     * Checks if such getter exists
     * @param $property_key
     * @return mixed
     */
    public function __get($property_key)
    {
        if ($this->getterExists($property_key)) {
            $method = 'get' . str_replace('_', '', $property_key);

            return $this->{$method}();
        }else{
            var_dump('Such getter doesn\'t exist');
        }
    }

    /**
     * checks if getter exists
     * @param $property_key
     * @return bool
     */
    private function getterExists($property_key): bool
    {
        $method = 'set' . str_replace('_', '', $property_key);

        if (method_exists($this, $method)) {
            return true;
        }

        return false;
    }
}