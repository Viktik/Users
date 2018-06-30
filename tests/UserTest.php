<?php

require '../User.php';

class UserTest extends PHPUnit\Framework\TestCase
{
    private $users;

    protected function setUp()
    {
        $this->users = new Users();
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

}