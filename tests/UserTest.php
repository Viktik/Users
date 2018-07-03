<?php

require_once "../vendor/autoload.php";

use User\User;

//require '../User.php';

class UserTest extends PHPUnit\Framework\TestCase
{
    private $users;

    protected function setUp()
    {
        $this->users = new User();
    }

    protected function tearDown()
    {
        $this->users = NULL;
    }

    public function testGetEmails()
    {
        $result = $this->users->getEmails();
        $this->assertEquals(["bob@gmail.com", "bill@yahoo.com", "rickM@gmail.com"], $result);
    }

    public function testGetInfo()
    {
        $string = 'rickM@gmail.com';
        $result = $this->users->getInfo($string);
        $this->assertEquals(['name' => 'Rick', 'phone' => '+133524788514', 'email' => 'rickM@gmail.com'], $result);
    }

    public function testGetEmailsSQL()
    {
        $result = $this->users->getEmailsSQL();
        $this->assertEquals(['0' => 'bob@gmail.com', '1' => 'bill@yahoo.com', '2' => 'rickM@gmail.com'], $result);
    }

    public function testGetInfoSQL()
    {
        $string = 'rickM@gmail.com';
        $result = $this->users->getInfoSQL($string);
        $this->assertEquals(['name' => 'Rick', 'phone' => '+133524788514', 'email' => 'rickM@gmail.com'], $result);
    }
}
