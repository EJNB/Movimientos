<?php

namespace System\MovementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="System\MovementBundle\Repository\PersonRepository")
 */
class Person
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
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=255)
     */
    private $cargo;

    /**
     * @var string
     *
     * @ORM\Column(name="CI", type="string", length=255)
     */
    private $cI;

    /**
     * Many Persons have One Intaltion.
     * @ORM\ManyToOne(targetEntity="Instalation", inversedBy="persons")
     * @ORM\JoinColumn(name="instalation_id", referencedColumnName="id")
     */
    private $instalation;


    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Movement", mappedBy="person")
     */
    private $movements;

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
     * @return Person
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
     * Set cargo
     *
     * @param string $cargo
     * @return Person
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * Set cI
     *
     * @param string $cI
     * @return Person
     */
    public function setCI($cI)
    {
        $this->cI = $cI;

        return $this;
    }

    /**
     * Get cI
     *
     * @return string 
     */
    public function getCI()
    {
        return $this->cI;
    }

    /**
     * Add movements
     *
     * @param \System\MovementBundle\Entity\Movement $movements
     * @return Person
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

    public function __toString()
    {
        return $this->getName();
    }
}
