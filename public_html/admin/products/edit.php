<?php

use App\Controllers\Admin\ProductsController;

require '../../../bootloader.php';

print (new ProductsController())->edit();