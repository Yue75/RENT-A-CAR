<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Admin extends User
{
    public function __construct()
{
    parent::__construct();
    $this->setRoles(['ROLE_ADMIN', 'ROLE_USER']); 
}


    public static function createAdmin(string $email, string $password, $passwordHasher): self
    {
        $admin = new self();
        $admin->setEmail($email);
        $admin->setPassword($passwordHasher->hashPassword($admin, $password));
        return $admin;
    }
}
