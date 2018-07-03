<?php

namespace IUser;

interface IUser
{
    public function getEmails();

    public function getInfo(string $email);
}