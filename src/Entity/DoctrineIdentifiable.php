<?php
namespace DigipolisGent\SymfonyCommon\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class DoctrineIdentifiable
 *
 * @package DigipolisGent\SymfonyCommon\Entity
 * @ORM\MappedSuperclass()
 */
trait DoctrineIdentifiable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var integer
     */
    protected $id;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
