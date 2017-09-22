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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="System\SecurityBundle\Entity\User", inversedBy="movements")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Instalation", inversedBy="movements")
     * @ORM\JoinColumn(name="instalation_id", referencedColumnName="id")
     */
    private $instalation;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="System\BackendBundle\Entity\Equipment", mappedBy="movement", cascade={"persist"})
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
}
