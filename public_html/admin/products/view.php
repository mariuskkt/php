<?php

require '../../../bootloader.php';

print (new \App\Controllers\Admin\ProductsController())->index();
