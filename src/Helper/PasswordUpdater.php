<?php

namespace DigipolisGent\SymfonyCommon\Helper;

use DigipolisGent\SymfonyCommon\Entity\UserInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class PasswordUpdater
{
    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    /**
     * PasswordUpdater constructor.
     *
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(EncoderFactoryInterface $encoderFactory)
    {
        $this->encoderFactory = $encoderFactory;
    }

    /**
     * @param UserInterface $user
     */
    public function updatePassword(UserInterface $user)
    {
        $encoder = $this->encoderFactory->getEncoder($user);
        $password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());

        $user->setPassword($password);
        $user->eraseCredentials();
    }
}
