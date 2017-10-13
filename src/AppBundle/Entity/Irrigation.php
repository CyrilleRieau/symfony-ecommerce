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
     * @var bool
     *
     * @ORM\Column(name="low", type="boolean")
     */
    private $low;

    /**
     * @var bool
     *
     * @ORM\Column(name="middle", type="boolean")
     */
    private $middle;

    /**
     * @var bool
     *
     * @ORM\Column(name="high", type="boolean")
     */
    private $high;


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
     * Set low
     *
     * @param boolean $low
     *
     * @return Irrigation
     */
    public function setLow($low)
    {
        $this->low = $low;

        return $this;
    }

    /**
     * Get low
     *
     * @return bool
     */
    public function getLow()
    {
        return $this->low;
    }

    /**
     * Set middle
     *
     * @param boolean $middle
     *
     * @return Irrigation
     */
    public function setMiddle($middle)
    {
        $this->middle = $middle;

        return $this;
    }

    /**
     * Get middle
     *
     * @return bool
     */
    public function getMiddle()
    {
        return $this->middle;
    }

    /**
     * Set high
     *
     * @param boolean $high
     *
     * @return Irrigation
     */
    public function setHigh($high)
    {
        $this->high = $high;

        return $this;
    }

    /**
     * Get high
     *
     * @return bool
     */
    public function getHigh()
    {
        return $this->high;
    }
     /**
     * @ORM\OneToOne(targetEntity="Product", inversedBy="prodirrig")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $irrigprod;
}

