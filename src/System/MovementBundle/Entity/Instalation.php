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
     * One Intalation has Many Persons.
     * @ORM\OneToMany(targetEntity="Person", mappedBy="instalation")
     */
    private $persons;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Territory", inversedBy="instalations")
     * @ORM\JoinColumn(name="territoty_id", referencedColumnName="id")
     */
    private $territoty;

    public function __construct() {
        $this->persons = new ArrayCollection();
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

    /**
     * Add persons
     *
     * @param \System\MovementBundle\Entity\Person $persons
     * @return Instalation
     */
    public function addPerson(\System\MovementBundle\Entity\Person $persons)
    {
        $this->persons[] = $persons;

        return $this;
    }

    /**
     * Remove persons
     *
     * @param \System\MovementBundle\Entity\Person $persons
     */
    public function removePerson(\System\MovementBundle\Entity\Person $persons)
    {
        $this->persons->removeElement($persons);
    }

    /**
     * Get persons
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPersons()
    {
        return $this->persons;
    }
}
