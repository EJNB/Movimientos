<?php

namespace System\BackendBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marks
 *
 * @ORM\Table(name="mark")
 * @ORM\Entity(repositoryClass="System\BackendBundle\Repository\MarksRepository")
 */
class Mark
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
     * One Marks has Many Models.
     * @ORM\OneToMany(targetEntity="Model", mappedBy="mark")
     */
    private $models;

    public function __construct() {
        $this->models = new ArrayCollection();
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
     * @return Mark
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
     * Add models
     *
     * @param \System\BackendBundle\Entity\Model $models
     * @return Mark
     */
    public function addModel(\System\BackendBundle\Entity\Model $models)
    {
        $this->models[] = $models;

        return $this;
    }

    /**
     * Remove models
     *
     * @param \System\BackendBundle\Entity\Model $models
     */
    public function removeModel(\System\BackendBundle\Entity\Model $models)
    {
        $this->models->removeElement($models);
    }

    /**
     * Get models
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModels()
    {
        return $this->models;
    }

    public function __toString()
    {
        return $this->getName();
        // TODO: Implement __toString() method.
    }
}
