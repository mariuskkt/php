<?php

namespace App\Users;

class User

{
    /**
     * Pixel constructor.
     * @param array|null $data
     * @throws Exception
     */
    public function __construct(array $data = null)
    {
        if ($data) {
            $this->_setData($data);
        }
    }

    /**
     * sets x in data array
     * @param string $value
     */
    public function setUsername(string $value): void
    {
        $this->username = $value;
    }

    /**
     * gets x from data array
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username ?? null;
    }


    /**
     * sets y in data array
     * @param string $value
     * @return void
     */
    public function setEmail(string $value): void
    {
        $this->email = $value;
    }

    /**
     * gets y from data array
     * @return string|null
     */
    private function getEmail(): ?string
    {
        return $this->email ?? null;
    }


    /**
     * sets color in data array
     * @param string $value
     * @return void
     */
    public function setPassword(string $value): void
    {
        $this->password = $value;
    }

    /**
     * gets color from data array
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password ?? null;
    }

    /**
     *Sets properties from array
     * @param array $array
     */
    public function _setData(array $array)
    {
        foreach ($array as $property_key => $value) {
            $this->__set($property_key, $value);
        }
    }

//    /**
//     * sets data from array
//     * @param array $data
//     * @throws Exception
//     */
//    public function setData(array $data): void
//    {
//        foreach ($this->properties as $property) {
//            if (isset($data[$property])) {
//                $method = 'set' . str_replace('_', '', $property);
//                $this->{$method}($data[$property]);
//            }
//        }
//    }
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

//    /**
//     * returns results array from data
//     * @return array
//     */
//    public function getData(): array
//    {
//        $results = [];
//
//        foreach ($this->properties as $property) {
//            $method = 'get' . str_replace('_', '', $property);
//
//            $results[$property] = $this->{$method}();
//        }
//        return $results;
//    }

    /**
     * @return array
     */
    public function _getData(): array
    {
        $results = [];

        foreach ($this->_getPropertyKeys() as $property_key) {
            $results[$property_key] = $this->__get($property_key);
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
        if ($method = $this->_getSetterExits($property_key)) {

            $this->{$method}($value);
        } else {
            var_dump('such setter doesn\'t exist');
        }
    }

    /**
     * Checks if setter exists
     * @param $property_key
     * @return string|null
     */
    private function _getSetterExits($property_key): ?string
    {
        $method = $this->keyToMethod('set', $property_key);

        if (method_exists($this, $method)) {
            return $method;
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
        if ($method = $this->_getGetterExists($property_key)) {

            return $this->{$method}();
        } else {
            var_dump('Such getter doesn\'t exist');
        }
    }

    /**
     * @param $property_key
     * @return string|null
     */
    private function _getGetterExists($property_key)
    {
        $method = $this->keyToMethod('get', $property_key);

        if (method_exists($this, $method)) {
            return $method;
        }

        return false;
    }

    /**
     *
     * @param $prefix
     * @param $property_key
     * @return string|null
     */
    private function keyToMethod($prefix, $property_key): ?string
    {
        return $prefix . str_replace('_', '', $property_key);
    }

    /**
     * Converts method name to key with underscore
     * @param $prefix
     * @param $method
     * @return mixed
     */
    private function methodToKey(string $prefix, string $method): ?string
    {
        $snake_case = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $method));

        return str_replace($prefix . '_', '', $snake_case);
    }

    /**
     * Returns array with
     * @return array
     */
    public function _getPropertyKeys(): array
    {
        $results = [];

        $all_methods = get_class_methods($this);

        foreach ($all_methods as $method_name) {
            if (preg_match('/^get/', $method_name) && !in_array($method_name, ['_getGetterExists', 'getData'])) {

                $results[] = $this->methodToKey('get', $method_name);
            }
        }

        return $results;
    }
}