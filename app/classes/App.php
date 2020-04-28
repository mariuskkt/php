<?php

namespace App;

use Core\Databases\FileDB;
use Core\Session;
//use App\Pixels\Pixel;

class App
{
    public static $db;
    public static $session;
    public static $pixels;

    public function __construct()
    {
        self::$db = new FileDB(USERS_DB);
        self::$db->load();

        self::$session = new Session();

//        self::$pixels = new Pixel();
    }

    public function __destruct()
    {
        self::$db->save();
    }
}