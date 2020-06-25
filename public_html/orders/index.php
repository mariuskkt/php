<?php

use App\Controllers\User\OrdersController;

require '../../bootloader.php';

print (new OrdersController())->index();