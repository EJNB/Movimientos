<?php

namespace System\MovementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Movement
 *
 * @ORM\Table(name="movement")
 * @ORM\Entity(repositoryClass="System\MovementBundle\Repository\MovementRepository")
 */
class Movement
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
     * @var \Integer
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="System\SecurityBundle\Entity\User", inversedBy="movements")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

//    /**
//     * Many Features have One Product.
//     * @ORM\ManyToOne(targetEntity="Instalation", inversedBy="movements")
//     * @ORM\JoinColumn(name="instalation_id", referencedColumnName="id")
//     */
//    private $instalation;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="System\BackendBundle\Entity\Equipment", mappedBy="movement", cascade={"persist"})
     */
    private $equipments;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="movements")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $person;

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
     * Set date
     *
     * @param \DateTime $date
     * @return Movement
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param \System\SecurityBundle\Entity\User $user
     * @return Movement
     */
    public function setUser(\System\SecurityBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \System\SecurityBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
//
//    /**
//     * Set instalation
//     *
//     * @param \System\MovementBundle\Entity\Instalation $instalation
//     * @return Movement
//     */
//    public function setInstalation(\System\MovementBundle\Entity\Instalation $instalation = null)
//    {
//        $this->instalation = $instalation;
//
//        return $this;
//    }
//
//    /**
//     * Get instalation
//     *
//     * @return \System\MovementBundle\Entity\Instalation
//     */
//    public function getInstalation()
//    {
//        return $this->instalation;
//    }

    /**
     * Add equipments
     *
     * @param \System\BackendBundle\Entity\Equipment $equipments
     * @return Movement
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

    /**
     * Set person
     *
     * @param \System\MovementBundle\Entity\Person $person
     * @return Movement
     */
    public function setPerson(\System\MovementBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \System\MovementBundle\Entity\Person 
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return Movement
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }
}
