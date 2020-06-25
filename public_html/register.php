<?php

require '../bootloader.php';

print (new App\Controllers\Auth\RegisterController())->index();