<?php

namespace System\MovementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Intalation
 *
 * @ORM\Table(name="intalation")
 * @ORM\Entity(repositoryClass="System\MovementBundle\Repository\IntalationRepository")
 */
class Instalation
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
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Movement", mappedBy="instalation")
     */
    private $movements;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Territory", inversedBy="instalations")
     * @ORM\JoinColumn(name="territoty_id", referencedColumnName="id")
     */
    private $territoty;

    public function __construct() {
        $this->movements = new ArrayCollection();
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
     * @return Intalation
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
     * Add movements
     *
     * @param \System\MovementBundle\Entity\Movement $movements
     * @return Instalation
     */
    public function addMovement(\System\MovementBundle\Entity\Movement $movements)
    {
        $this->movements[] = $movements;

        return $this;
    }

    /**
     * Remove movements
     *
     * @param \System\MovementBundle\Entity\Movement $movements
     */
    public function removeMovement(\System\MovementBundle\Entity\Movement $movements)
    {
        $this->movements->removeElement($movements);
    }

    /**
     * Get movements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovements()
    {
        return $this->movements;
    }

    /**
     * Set territoty
     *
     * @param \System\MovementBundle\Entity\Territory $territoty
     * @return Instalation
     */
    public function setTerritoty(\System\MovementBundle\Entity\Territory $territoty = null)
    {
        $this->territoty = $territoty;

        return $this;
    }

    /**
     * Get territoty
     *
     * @return \System\MovementBundle\Entity\Territory 
     */
    public function getTerritoty()
    {
        return $this->territoty;
    }

    public function __toString()
    {
        return $this->getName();
        // TODO: Implement __toString() method.
    }
}
