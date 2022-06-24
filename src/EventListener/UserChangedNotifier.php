<?php

namespace App\EventListener;

use App\Entity\User;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserChangedNotifier
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasherInterface)
    {
        $this->hasher = $hasherInterface;
    }

    public function __invoke(User $user, LifecycleEventArgs $lifecycleEventArgs)
    {
        $hashedPassword = $this->hasher->hashPassword($user, $user->getPassword());
        $user->setPassword($hashedPassword);   
    }
}