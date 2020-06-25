<?php

use App\Controllers\Admin\OrdersController;

require '../../../bootloader.php';

print (new OrdersController())->view();
