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
     * @var bool
     *
     * @ORM\Column(name="acid", type="boolean")
     */
    private $acid;

    /**
     * @var bool
     *
     * @ORM\Column(name="clayey", type="boolean")
     */
    private $clayey;

    /**
     * @var bool
     *
     * @ORM\Column(name="chalky", type="boolean")
     */
    private $chalky;

    /**
     * @var bool
     *
     * @ORM\Column(name="sandy", type="boolean")
     */
    private $sandy;

    /**
     * @var bool
     *
     * @ORM\Column(name="humus", type="boolean")
     */
    private $humus;


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
     * Set acid
     *
     * @param boolean $acid
     *
     * @return Soil
     */
    public function setAcid($acid)
    {
        $this->acid = $acid;

        return $this;
    }

    /**
     * Get acid
     *
     * @return bool
     */
    public function getAcid()
    {
        return $this->acid;
    }

    /**
     * Set clayey
     *
     * @param boolean $clayey
     *
     * @return Soil
     */
    public function setClayey($clayey)
    {
        $this->clayey = $clayey;

        return $this;
    }

    /**
     * Get clayey
     *
     * @return bool
     */
    public function getClayey()
    {
        return $this->clayey;
    }

    /**
     * Set chalky
     *
     * @param boolean $chalky
     *
     * @return Soil
     */
    public function setChalky($chalky)
    {
        $this->chalky = $chalky;

        return $this;
    }

    /**
     * Get chalky
     *
     * @return bool
     */
    public function getChalky()
    {
        return $this->chalky;
    }

    /**
     * Set sandy
     *
     * @param boolean $sandy
     *
     * @return Soil
     */
    public function setSandy($sandy)
    {
        $this->sandy = $sandy;

        return $this;
    }

    /**
     * Get sandy
     *
     * @return bool
     */
    public function getSandy()
    {
        return $this->sandy;
    }

    /**
     * Set humus
     *
     * @param boolean $humus
     *
     * @return Soil
     */
    public function setHumus($humus)
    {
        $this->humus = $humus;

        return $this;
    }

    /**
     * Get humus
     *
     * @return bool
     */
    public function getHumus()
    {
        return $this->humus;
    }
    /**
     * @ORM\OneToOne(targetEntity="Product", inversedBy="prodsoil")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $soilprod;
}

