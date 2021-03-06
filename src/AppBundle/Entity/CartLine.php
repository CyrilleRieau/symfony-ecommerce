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

    /**
     * Set cartcartline
     *
     * @param \AppBundle\Entity\Cart $cartcartline
     *
     * @return CartLine
     */
    public function setCartcartline(\AppBundle\Entity\Cart $cartcartline = null)
    {
        $this->cartcartline = $cartcartline;

        return $this;
    }

    /**
     * Get cartcartline
     *
     * @return \AppBundle\Entity\Cart
     */
    public function getCartcartline()
    {
        return $this->cartcartline;
    }

    /**
     * Set prodcartline
     *
     * @param \AppBundle\Entity\Product $prodcartline
     *
     * @return CartLine
     */
    public function setProdcartline(\AppBundle\Entity\Product $prodcartline = null)
    {
        $this->prodcartline = $prodcartline;

        return $this;
    }

    /**
     * Get prodcartline
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProdcartline()
    {
        return $this->prodcartline;
    }
}
