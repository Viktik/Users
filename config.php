<?php
require_once "vendor/autoload.php";

use models\user\IUser\IUser;
use models\user\UserJson\UserJson;
use models\user\UserSQL\UserSQL;
use controllers\user\WebController\WebController;

$base = "sql";

switch ($base) {
    case 'json':
        $class = new UserJson();
        break;
    case 'sql':
        $class = new UserSQL();
        break;
}

$controller = new WebController($class);
