<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Exposition
 *
 * @ORM\Table(name="exposition")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExpositionRepository")
 */
class Exposition
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Exposition
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="prodexpo")
     */
    private $expoprod;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->expoprod = new ArrayCollection();
    }
}

