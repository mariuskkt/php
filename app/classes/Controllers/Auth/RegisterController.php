<?php


namespace App\Controllers\Auth;


use App\Controllers\BaseController;
use App\Views\Forms\Auth\RegisterForm;

class RegisterController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->page->setTitle('Register');
        $this->page->addStyle('assets/css/style.css');
    }

    public function index(): ?string
    {
        $form = new RegisterForm();

        /**
         * if fields are filled in correctly
         * @param $data
         * @param $safe_input
         * @throws Exception
         */
        if ($form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();
            unset($safe_input['repeat_password']);
            $user = new \App\Users\User($safe_input);
            $user->setRole(\App\Users\User::ROLE_USER);
            \App\Users\Model::insert($user);
            header("Location: /login.php");
        }

        $content = new \App\Views\Content([
            'h1' => 'Register',
            'form' => $form->render(),
        ]);

        $this->page->setContent($content->render('auth/register.tpl.php'));

        return $this->page->render();
    }
}