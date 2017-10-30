<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="label", type="string", length=255)
     */
    private $label;

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
     * Set label
     *
     * @param string $label
     *
     * @return Exposition
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
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
        $this->expoprod = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add expoprod
     *
     * @param \AppBundle\Entity\Product $expoprod
     *
     * @return Exposition
     */
    public function addExpoprod(\AppBundle\Entity\Product $expoprod)
    {
        $this->expoprod[] = $expoprod;

        return $this;
    }

    /**
     * Remove expoprod
     *
     * @param \AppBundle\Entity\Product $expoprod
     */
    public function removeExpoprod(\AppBundle\Entity\Product $expoprod)
    {
        $this->expoprod->removeElement($expoprod);
    }

    /**
     * Get expoprod
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExpoprod()
    {
        return $this->expoprod;
    }
}
