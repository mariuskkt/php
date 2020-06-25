<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Views\Forms\Auth\LoginForm;
use App\Views\Page;

class LoginController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Login');
        $this->page->addStyle('assets/css/style.css');
    }

    public function index(): ?string
    {
        $form = new LoginForm();
        /**
         * if fields are filled in correctly
         * @param $data
         * @param $safe_input
         * @throws Exception
         */
        if ($form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();
            \App\App::$session->login($safe_input['email'], $safe_input['password']);
            header("Location: /index.php");
        }

        $content = new \App\Views\Content([
            'h1' => 'Login',
            'form' => $form->render(),
        ]);


        $this->page->setContent($content->render('auth/login.tpl.php'));

        return $this->page->render();

        parent::index();
    }
}