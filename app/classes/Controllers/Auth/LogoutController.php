<?php


namespace App\Controllers\Auth;

use App\App;
use App\Controllers\BaseController;

class LogoutController extends BaseController
{
    public function index(): ?string
    {
        App::$session->logout('/login');
    }
}