<?php

namespace System\BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipment
 *
 * @ORM\Table(name="equipment")
 * @ORM\Entity(repositoryClass="System\BackendBundle\Repository\EquipmentRepository")
 */
class Equipment
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
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="ns", type="string", length=255)
     */
    private $ns;

    /**
     * @var int
     *
     * @ORM\Column(name="ni", type="integer")
     */
    private $ni;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_at", type="datetime")
     */
    private $createAt;

    /**
     * Many Equipment have One mark.
     * @ORM\ManyToOne(targetEntity="Model", inversedBy="equipments")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $model;

    /**
     * Many Equipment have One Type.
     * @ORM\ManyToOne(targetEntity="Type", inversedBy="equipments")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $type;

    /**
     * Many Equipments have One Movement.
     * @ORM\ManyToOne(targetEntity="System\MovementBundle\Entity\Movement", inversedBy="equipments")
     * @ORM\JoinColumn(name="movement_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $movement;

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
     * Set description
     *
     * @param string $description
     * @return Equipment
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set ns
     *
     * @param string $ns
     * @return Equipment
     */
    public function setNs($ns)
    {
        $this->ns = $ns;

        return $this;
    }

    /**
     * Get ns
     *
     * @return string 
     */
    public function getNs()
    {
        return $this->ns;
    }

    /**
     * Set ni
     *
     * @param integer $ni
     * @return Equipment
     */
    public function setNi($ni)
    {
        $this->ni = $ni;

        return $this;
    }

    /**
     * Get ni
     *
     * @return integer 
     */
    public function getNi()
    {
        return $this->ni;
    }

    /**
     * Set createAt
     *
     * @param \DateTime $createAt
     * @return Equipment
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get createAt
     *
     * @return \DateTime 
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set model
     *
     * @param \System\BackendBundle\Entity\Model $model
     * @return Equipment
     */
    public function setModel(\System\BackendBundle\Entity\Model $model = null)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \System\BackendBundle\Entity\Model 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set type
     *
     * @param \System\BackendBundle\Entity\Type $type
     * @return Equipment
     */
    public function setType(\System\BackendBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \System\BackendBundle\Entity\Type 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set movement
     *
     * @param \System\MovementBundle\Entity\Movement $movement
     * @return Equipment
     */
    public function setMovement(\System\MovementBundle\Entity\Movement $movement = null)
    {
        $this->movement = $movement;

        return $this;
    }

    /**
     * Get movement
     *
     * @return \System\MovementBundle\Entity\Movement 
     */
    public function getMovement()
    {
        return $this->movement;
    }

    public function __toString()
    {
        return $this->getDescription();
    }
}
