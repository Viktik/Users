<?php

namespace models\user\IUser;

interface IUser
{
    public function getEmails();

    public function getInfo(string $email);
}