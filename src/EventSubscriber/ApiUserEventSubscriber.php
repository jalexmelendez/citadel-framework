<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ApiUserEventSubscriber implements EventSubscriberInterface
{
    private $hasher;

    public function __construct(UserPasswordHasherInterface $hasherInterface)
    {
        $this->hasher = $hasherInterface;
    }

    public static function getSubscribedEvents()
    {
        return [
        ];
    }

    public function hashPasswordOnCreatedUser(ViewEvent $event)
    {
        $entity = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if(!($entity instanceof User)) {
            return;
        }

        $stringPassword = $entity->getPassword();
        $hashedPassword = $this->hasher->hashPassword($entity, $stringPassword);

        $entity->setPassword($hashedPassword);
        return;
    }

    public function hashPasswordOnUpdatedUser(ViewEvent $event)
    {
        $entity = $event->getControllerResult();

        if(!($entity instanceof User)) {
            return;
        }

        $stringPassword = $entity->getPassword();
        $hashedPassword = $this->hasher->hashPassword($entity, $stringPassword);

        $entity->setPassword($hashedPassword);
        return;
    }

}