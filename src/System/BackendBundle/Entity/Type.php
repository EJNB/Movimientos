<?php

namespace System\BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity(repositoryClass="System\BackendBundle\Repository\TypeRepository")
 */
class Type
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * One Type has Many Equipments.
     * @ORM\OneToMany(targetEntity="Equipment", mappedBy="type", cascade={"persist"})
     */
    private $equipments;

    public function __construct() {
        $this->equipments = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Type
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add equipments
     *
     * @param \System\BackendBundle\Entity\Equipment $equipments
     * @return Type
     */
    public function addEquipment(\System\BackendBundle\Entity\Equipment $equipments)
    {
        $this->equipments[] = $equipments;

        return $this;
    }

    /**
     * Remove equipments
     *
     * @param \System\BackendBundle\Entity\Equipment $equipments
     */
    public function removeEquipment(\System\BackendBundle\Entity\Equipment $equipments)
    {
        $this->equipments->removeElement($equipments);
    }

    /**
     * Get equipments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEquipments()
    {
        return $this->equipments;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getName();
    }
}
