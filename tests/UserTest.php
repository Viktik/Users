<?php

require_once "../vendor/autoload.php";

use classes\IUser\IUser, classes\UserSQL\UserSQL, classes\UserJson\UserJson;

//require '../User.php';

class UserTest extends PHPUnit\Framework\TestCase
{
    private $users;

    /*protected function setUp()
    {
        $this->users = new User();
    }

    protected function tearDown()
    {
        $this->users = NULL;
    }*/

    public function testGetEmails()
    {
        $this->users = new UserJson();
        $result = $this->users->getEmails();
        $this->assertEquals(["bob@gmail.com", "bill@yahoo.com", "rickM@gmail.com"], $result);
    }

    public function testGetInfo()
    {
        $this->users = new UserJson();
        $string = 'rickM@gmail.com';
        $result = $this->users->getInfo($string);
        //$this->assertEquals(['name' => 'Rick', 'phone' => '+133524788514', 'email' => 'rickM@gmail.com'], $result);
        $this->assertEquals(true, $result);
    }

    public function testGetEmailsSQL()
    {
        $this->users = new UserSQL();
        $result = $this->users->getEmails();
        $this->assertEquals(['0' => 'bob@gmail.com', '1' => 'bill@yahoo.com', '2' => 'rickM@gmail.com'], $result);
    }

    public function testGetInfoSQL()
    {
        $this->users = new UserSQL();
        $string = 'rickM@gmail.com';
        $result = $this->users->getInfo($string);
        //$this->assertEquals(['name' => 'Rick', 'phone' => '+133524788514', 'email' => 'rickM@gmail.com'], $result);
        $this->assertEquals(true, $result);

    }
}
