<?php
namespace DigipolisGent\SymfonyCommon\Entity;

/**
 * Class User
 *
 * @package DigipolisGent\SymfonyCommon\Entity\User
 */
interface UserInterface extends \Symfony\Component\Security\Core\User\UserInterface
{
    /**
     * @param string $username
     */
    public function setUsername($username);

    /**
     * @param string $password
     */
    public function setPassword($password);

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword($plainPassword);

    /**
     * @return string|null
     */
    public function getPlainPassword();

    /**
     * @param array $roles
     */
    public function setRoles(array $roles);

    /**
     * @return integer
     */
    public function getId();
}
