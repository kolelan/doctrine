<?php

use App\Modules\Accounting\Documents\Item;

phpinfo();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
var_dump(dirname(__DIR__));
var_dump(new Item('Счёт'));