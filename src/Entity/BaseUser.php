<?php
namespace DigipolisGent\SymfonyCommon\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 *
 * @package DigipolisGent\SymfonyCommon\Entity\User
 * @ORM\MappedSuperclass()
 * @ORM\EntityListeners({"DigipolisGent\SymfonyCommon\EventListener\UserEntityListener"})
 */
abstract class BaseUser implements UserInterface
{
    use DoctrineIdentifiable;
    
    /**
     * @var string
     * @ORM\Column(type="string", nullable=false, unique=true)
     */
    protected $username;

    /**
     * @var array
     * @ORM\Column(type="json_array", nullable=false)
     */
    protected $roles = [];

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    protected $password;

    /**
     * @var string
     */
    protected $plainPassword;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $created;

    /**
     * BaseUser constructor.
     */
    public function __construct()
    {
        $this->created = new \DateTime('now');
    }

    /**
     * @return void
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @param string $role
     */
    public function addRole($role)
    {
        if(!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }
    }

    /**
     * @param $role
     */
    public function removeRole($role)
    {
        if (in_array($role, $this->roles, true)) {
            $key = array_search($role, $this->roles, true);
            unset($this->roles[$key]);
        }
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
}
