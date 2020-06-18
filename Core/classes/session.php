<?php

namespace Core;

use App\App;
use App\Users\User;

class Session
{
    private $user = null;

    public function __construct()
    {
        $this->loginFromCookie();
    }

    public function loginFromCookie()
    {
        if ($_SESSION) {
            $this->login($_SESSION['email'], $_SESSION['password']);
        }
    }

    public function login($email, $password)
    {
        $conditions = [
            'email' => $email,
            'password' => $password
        ];

        if ($this->user = App::$db->getRowWhere('users', $conditions)) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            $this->user = New User($this->user);
            return true;
        }

        return false;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function logout($redirect = null)
    {
        $_SESSION = [];
        session_destroy();
        setcookie('PHPSESSID', null, -1);

        if ($redirect) {
            header("Location: $redirect");
        }
    }

    public function userIs(int $role)
    {
        $current_user = \App\App::$session->getUser();

        if ($current_user && $current_user->getRole() == $role) {
            return true;
        }

        return false;
    }
}