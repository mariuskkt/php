<?php

namespace App\Views;

use App\App;
use Core\View;

class Footer extends View
{
    public function __construct($data = [])
    {
        $user = App::$session->getUser();

        $data = [
            'links' => [
                [
                    'link' => '/index.php',
                    'name' => 'Catalog'
                ],
                [
                    'link' => '/login.php',
                    'name' => 'Login'
                ],
                [
                    'link' => '/register.php',
                    'name' => 'Register'
                ],
            ],
            'copyright' => 'Copyright 2020'
        ];

        if ($user) {
            $data = $this->loggedIn();
        }
        parent::__construct($data);
    }

    public function render(string $template_path = ROOT . '/app/templates/footer.tpl.php')
    {
        return parent::render($template_path);
    }

    public function loggedIn()
    {
        return [
            'links' => [
                [
                    'link' => '/index.php',
                    'name' => 'Catalog'
                ],
                [
                    'link' => '/register.php',
                    'name' => 'Register'
                ],
                [
                    'link' => '/logout.php',
                    'name' => 'Logout'
                ],
            ],
            'copyright' => 'Copyright 2020'
        ];
    }
}
