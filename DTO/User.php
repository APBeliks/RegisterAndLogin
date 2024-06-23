<?php

declare(strict_types=1);

namespace RegisterAndLogin;

class User
{
    public int $id;
    public string $userName;
    public string $email;
    public string $password;
    public string $firstName;
    public string $lastName;
    public int $birthDay;
    public string $country;
}
