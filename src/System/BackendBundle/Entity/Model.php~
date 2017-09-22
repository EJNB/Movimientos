<?php

namespace System\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Models
 *
 * @ORM\Table(name="model")
 * @ORM\Entity(repositoryClass="System\BackendBundle\Repository\ModelsRepository")
 */
class Model
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
     * Many Marks have One Models.
     * @ORM\ManyToOne(targetEntity="Mark", inversedBy="models")
     * @ORM\JoinColumn(name="mark_id", referencedColumnName="id")
     */
    private $mark;

    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Equipment", mappedBy="model", cascade={"persist"})
     */
    private $equipments;

    public function __construct()
    {
        $this->features = new ArrayCollection();
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
     * @return Model
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
     * Set mark
     *
     * @param \System\BackendBundle\Entity\Mark $mark
     * @return Model
     */
    public function setMark(\System\BackendBundle\Entity\Mark $mark = null)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return \System\BackendBundle\Entity\Mark 
     */
    public function getMark()
    {
        return $this->mark;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getName();
    }

    /**
     * Add equipments
     *
     * @param \System\BackendBundle\Entity\Equipment $equipments
     * @return Model
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
}
