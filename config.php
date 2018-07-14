<?php
require_once "vendor/autoload.php";

use classes\IUser\IUser;
use classes\UserJson\UserJson;
use classes\UserSQL\UserSQL;

$base = "sql";

switch ($base) {
    case 'json':
        $class = new UserJson();
        break;
    case 'sql':
        $class = new UserSQL();
        break;
}