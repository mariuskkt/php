<?php

require '../../../bootloader.php';


print (new \App\Controllers\Admin\OrdersController())->index();
