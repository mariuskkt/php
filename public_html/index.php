<?php

use App\Controllers\User\CatalogController;

require '../bootloader.php';

//print (new CatalogController())->index();
print \Core\Router::run();