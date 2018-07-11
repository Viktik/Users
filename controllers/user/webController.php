<?php
//require_once "../../vendor/autoload.php";
//require "../../config.php";

use classes\UserJson\UserJson;
use classes\UserSQL\UserSQL;

switch ($base) {
    case 'json':
        $class = new UserJson();
        break;
    case 'sql':
        $class = new UserSql();
        break;
}

class WebController
{
    public $allInfo = [];
    public $userInfo = [];
    public function __construct($class)
    {
        $this->base = $class;
    }

    /*function getEmails(){
        return $this->base->getEmails();
    }*/

    public function getInfo($email){
        $this->base->getInfo($email);
        $this->userInfo['name'] = $this->base->name;
        $this->userInfo['phone'] = $this->base->phone;
        $this->userInfo['email'] = $this->base->email;
        unset ($_GET['command']);
        return $this->userInfo;
    }

    public function getAllInfo(){
        $this->base->getAllInfo();
        unset ($_GET['command']);
        return $this->allInfo = $this->base->allInfo;
    }
}

/*$controller = new WebController($class);
var_dump($controller->getAllInfo());*/

