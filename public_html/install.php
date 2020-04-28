<?php

require '../bootloader.php';

if ($created = App\App::$db->createTable('users')) {
    var_dump('users table created');
}
if ($created = App\App::$db->createTable('pixels')) {
    var_dump('pixels table created');
}