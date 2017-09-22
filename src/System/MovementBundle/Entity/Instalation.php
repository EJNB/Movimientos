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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Movement", mappedBy="instalation")
     */
    private $movements;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Person", mappedBy="instalation")
     */
    private $persons;

    public function __construct() {
        $this->persons = new ArrayCollection();
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
}
