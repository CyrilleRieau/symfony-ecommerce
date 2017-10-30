<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Irrigation
 *
 * @ORM\Table(name="irrigation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IrrigationRepository")
 */
class Irrigation
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
     * @return Irrigation
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
     * @ORM\OneToMany(targetEntity="Product", mappedBy="prodirrig")
     */
    private $irrigprod;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->irrigprod = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add irrigprod
     *
     * @param \AppBundle\Entity\Product $irrigprod
     *
     * @return Irrigation
     */
    public function addIrrigprod(\AppBundle\Entity\Product $irrigprod)
    {
        $this->irrigprod[] = $irrigprod;

        return $this;
    }

    /**
     * Remove irrigprod
     *
     * @param \AppBundle\Entity\Product $irrigprod
     */
    public function removeIrrigprod(\AppBundle\Entity\Product $irrigprod)
    {
        $this->irrigprod->removeElement($irrigprod);
    }

    /**
     * Get irrigprod
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIrrigprod()
    {
        return $this->irrigprod;
    }
}
