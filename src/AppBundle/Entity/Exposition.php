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
     * @var bool
     *
     * @ORM\Column(name="sunny", type="boolean")
     */
    private $sunny;

    /**
     * @var bool
     *
     * @ORM\Column(name="windy", type="boolean")
     */
    private $windy;


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
     * Set sunny
     *
     * @param boolean $sunny
     *
     * @return Exposition
     */
    public function setSunny($sunny)
    {
        $this->sunny = $sunny;

        return $this;
    }

    /**
     * Get sunny
     *
     * @return bool
     */
    public function getSunny()
    {
        return $this->sunny;
    }

    /**
     * Set windy
     *
     * @param boolean $windy
     *
     * @return Exposition
     */
    public function setWindy($windy)
    {
        $this->windy = $windy;

        return $this;
    }

    /**
     * Get windy
     *
     * @return bool
     */
    public function getWindy()
    {
        return $this->windy;
    }
    /**
     * @ORM\OneToOne(targetEntity="Product", inversedBy="prodexpo")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $expoprod;

    /**
     * Set expoprod
     *
     * @param \AppBundle\Entity\Product $expoprod
     *
     * @return Exposition
     */
    public function setExpoprod(\AppBundle\Entity\Product $expoprod = null)
    {
        $this->expoprod = $expoprod;

        return $this;
    }

    /**
     * Get expoprod
     *
     * @return \AppBundle\Entity\Product
     */
    public function getExpoprod()
    {
        return $this->expoprod;
    }
}
