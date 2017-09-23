<?php

namespace System\MovementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Territory
 *
 * @ORM\Table(name="territory")
 * @ORM\Entity(repositoryClass="System\MovementBundle\Repository\TerritoryRepository")
 */
class Territory
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Instalation", mappedBy="territoty")
     */
    private $instalations;

    public function __construct() {
        $this->instalations = new ArrayCollection();
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
     * @return Territory
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
     * Add instalations
     *
     * @param \System\MovementBundle\Entity\Instalation $instalations
     * @return Territory
     */
    public function addInstalation(\System\MovementBundle\Entity\Instalation $instalations)
    {
        $this->instalations[] = $instalations;

        return $this;
    }

    /**
     * Remove instalations
     *
     * @param \System\MovementBundle\Entity\Instalation $instalations
     */
    public function removeInstalation(\System\MovementBundle\Entity\Instalation $instalations)
    {
        $this->instalations->removeElement($instalations);
    }

    /**
     * Get instalations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInstalations()
    {
        return $this->instalations;
    }

    public function __toString()
    {
        return $this->getName();
        // TODO: Implement __toString() method.
    }
}
