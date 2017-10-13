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
     * @var bool
     *
     * @ORM\Column(name="inferior_0°C", type="boolean")
     */
    private $inferior0°C;

    /**
     * @var bool
     *
     * @ORM\Column(name="between_0_and_5°C", type="boolean")
     */
    private $between0And5°C;

    /**
     * @var bool
     *
     * @ORM\Column(name="superior_5°C", type="boolean")
     */
    private $superior5°C;


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
     * Set inferior0°C
     *
     * @param boolean $inferior0°C
     *
     * @return Resistance
     */
    public function setInferior0°C($inferior0°C)
    {
        $this->inferior0°C = $inferior0°C;

        return $this;
    }

    /**
     * Get inferior0°C
     *
     * @return bool
     */
    public function getInferior0°C()
    {
        return $this->inferior0°C;
    }

    /**
     * Set between0And5°C
     *
     * @param boolean $between0And5°C
     *
     * @return Resistance
     */
    public function setBetween0And5°C($between0And5°C)
    {
        $this->between0And5°C = $between0And5°C;

        return $this;
    }

    /**
     * Get between0And5°C
     *
     * @return bool
     */
    public function getBetween0And5°C()
    {
        return $this->between0And5°C;
    }

    /**
     * Set superior5°C
     *
     * @param boolean $superior5°C
     *
     * @return Resistance
     */
    public function setSuperior5°C($superior5°C)
    {
        $this->superior5°C = $superior5°C;

        return $this;
    }

    /**
     * Get superior5°C
     *
     * @return bool
     */
    public function getSuperior5°C()
    {
        return $this->superior5°C;
    }
     /**
     * @ORM\OneToOne(targetEntity="Product", inversedBy="prodresist")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $resistprod;
}

