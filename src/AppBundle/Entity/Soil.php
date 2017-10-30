<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soil
 *
 * @ORM\Table(name="soil")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SoilRepository")
 */
class Soil
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
     * @return Soil
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
     * @ORM\OneToMany(targetEntity="Product", mappedBy="prodsoil")
     */
    private $soilprod;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->soilprod = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add soilprod
     *
     * @param \AppBundle\Entity\Product $soilprod
     *
     * @return Soil
     */
    public function addSoilprod(\AppBundle\Entity\Product $soilprod)
    {
        $this->soilprod[] = $soilprod;

        return $this;
    }

    /**
     * Remove soilprod
     *
     * @param \AppBundle\Entity\Product $soilprod
     */
    public function removeSoilprod(\AppBundle\Entity\Product $soilprod)
    {
        $this->soilprod->removeElement($soilprod);
    }

    /**
     * Get soilprod
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSoilprod()
    {
        return $this->soilprod;
    }
}
