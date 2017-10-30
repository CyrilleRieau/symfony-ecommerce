<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resistance
 *
 * @ORM\Table(name="resistance")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ResistanceRepository")
 */
class Resistance
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
     * @return Resistance
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
     * @ORM\OneToMany(targetEntity="Product", mappedBy="prodresist")
     */
    private $resistprod;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->resistprod = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add resistprod
     *
     * @param \AppBundle\Entity\Product $resistprod
     *
     * @return Resistance
     */
    public function addResistprod(\AppBundle\Entity\Product $resistprod)
    {
        $this->resistprod[] = $resistprod;

        return $this;
    }

    /**
     * Remove resistprod
     *
     * @param \AppBundle\Entity\Product $resistprod
     */
    public function removeResistprod(\AppBundle\Entity\Product $resistprod)
    {
        $this->resistprod->removeElement($resistprod);
    }

    /**
     * Get resistprod
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResistprod()
    {
        return $this->resistprod;
    }
}
