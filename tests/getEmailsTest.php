<?php

require 'Users.php';

class getEmailsTest extends PHPUnit\Framework\TestCase
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

}
