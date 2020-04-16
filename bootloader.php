<?php

require 'core/functions/html.php';
require 'core/functions/form/core.php';
require 'core/functions/form/validators.php';

require 'app/functions/form/validators.php';

require  'core/functions/file.php';

require  'core/functions/auth.php';

define('DB_FILE', 'app/data/db.json');
define('TEAMS_DB', 'app/data/teams.json');

session_start();

