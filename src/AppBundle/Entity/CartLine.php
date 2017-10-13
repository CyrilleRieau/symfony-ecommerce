<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CartLine
 *
 * @ORM\Table(name="cart_line")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CartLineRepository")
 */
class CartLine
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
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;


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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return CartLine
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return CartLine
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * @ORM\ManyToOne(targetEntity="Cart", inversedBy="cartlinecart")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     */
    private $cartcartline;
    /**
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="cartlineprod")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $prodcartline;
}

