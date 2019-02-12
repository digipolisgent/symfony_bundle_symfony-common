<?php
namespace DigipolisGent\SymfonyCommon\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class DoctrineIdentifiable
 *
 * @package DigipolisGent\SymfonyCommon\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\MappedSuperclass()
 */
trait DoctrineTimestampable
{
    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @var \DateTime
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @var \DateTime
     */
    protected $updated;

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @ORM\PrePersist()
     */
    public function create()
    {
        $this->created = new \DateTime('now');
        $this->updated = new \DateTime('now');
    }

    /**
     * @ORM\PreUpdate()
     */
    public function update()
    {
        $this->updated = new \DateTime('now');
    }
}
