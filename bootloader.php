<?php

declare(strict_types=1);

session_start();

define('ROOT', __DIR__);

define('DB_FILE', ROOT . '/app/data/db.json');
define('TEAMS_DB', ROOT . '/app/data/teams.json');
define('USERS_DB', ROOT . '/app/data/users.json');

require 'core/functions/html.php';
require 'core/functions/form/core.php';
require 'core/functions/form/validators.php';
require 'core/functions/file.php';
require 'core/functions/auth.php';


require 'app/functions/form/validators.php';

require 'vendor/autoload.php';

$app = new App\App();
