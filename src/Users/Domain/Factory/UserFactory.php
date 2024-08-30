<?php

namespace App\Users\Domain\Factory;

use App\Users\Domain\Entity\User;
use App\Users\Domain\Service\UserPasswordHasherInterface;

final readonly class UserFactory
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
    ) {
    }

    public function create(
        string $login,
        string $email,
        string $password,
    ): User {
        $user = new User();
        $user->setLogin($login);
        $user->setEmail($email);
        $user->setPassword($password, $this->passwordHasher);
        $user->setRoles(['ROLE_USER']);

        return $user;
    }
}
