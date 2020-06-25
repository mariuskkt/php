<?php

use App\Controllers\User\CartController;

require '../bootloader.php';

print (new CartController())->index();