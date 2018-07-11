<?php
require_once "../../vendor/autoload.php";
require "../../config.php";

use classes\UserJson\UserJson, classes\UserSQL\UserSQL;

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
    function __construct($class)
    {
        $this->base = $class;
    }

    function getEmails(){
        return $this->base->getEmails();
    }

    function getInfo($email){
        $this->base->getInfo($email);
        $this->userInfo['name'] = $this->base->name;
        $this->userInfo['phone'] = $this->base->phone;
        $this->userInfo['email'] = $this->base->email;
        return $this->userInfo;
    }

    function getAllInfo(){
        $this->base->getAllInfo();
        return $this->allInfo = $this->base->allInfo;
    }
}

$controller = new WebController($class);
var_dump($controller->getAllInfo());

