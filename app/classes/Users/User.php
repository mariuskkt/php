<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder

{
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