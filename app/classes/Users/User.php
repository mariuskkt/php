<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder

{
    const ROLE_ADMIN = 0;
    const ROLE_USER = 1;

    /**
     * gets role in data array
     * @return int|null
     */
    public function getRole(): ?int
    {
        return $this->role ?? null;
    }

    /**
     * sets role in data array
     * @param int $role
     * @return void
     */
    public function setRole(int $role): void
    {
        $this->role = $role;
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
     * sets name in data array
     * @param string $value
     */
    public function setName(string $value): void
    {
        $this->name = $value;
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
     * sets surname in data array
     * @param string $value
     */
    public function setSurname(string $value): void
    {
        $this->surname = $value;
    }

    /**
     * gets surname from data array
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname ?? null;
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
    public function getEmail(): ?string
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