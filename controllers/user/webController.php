<?php
require_once "../../vendor/autoload.php";
require "../../config.php";

use classes\IUser\IUser, classes\UserJson\UserJson, classes\UserSQL\UserSQL;

switch ($base) {
    case 'json':
        $user = new UserJson();
        break;
    case 'sql':
        $user = new UserSQL();
        break;
}