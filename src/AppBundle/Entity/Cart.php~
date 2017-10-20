<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cart
 *
 * @ORM\Table(name="cart")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CartRepository")
 */
class Cart
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
     * @ORM\Column(name="product", type="string", length=255)
     */
    private $product;

    /**
     * @var float
     *
     * @ORM\Column(name="totalPrice", type="float")
     */
    private $totalPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="totalArticle", type="integer")
     */
    private $totalArticle;


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
     * Set product
     *
     * @param string $product
     *
     * @return Cart
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set totalPrice
     *
     * @param float $totalPrice
     *
     * @return Cart
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get totalPrice
     *
     * @return float
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set totalArticle
     *
     * @param integer $totalArticle
     *
     * @return Cart
     */
    public function setTotalArticle($totalArticle)
    {
        $this->totalArticle = $totalArticle;

        return $this;
    }

    /**
     * Get totalArticle
     *
     * @return int
     */
    public function getTotalArticle()
    {
        return $this->totalArticle;
    }
     /**
     * @ORM\ManyToOne(targetEntity="ClientConnected", inversedBy="carts")
     * @ORM\JoinColumn(name="clientConnected_id", referencedColumnName="id")
     */
    private $clientco;
    /**
    * @ORM\OneToOne(targetEntity="PaymentMode", mappedBy="cartpay")
    */
    private $cartpaymode;
     /**
     * @ORM\OneToMany(targetEntity="CartLine", mappedBy="cartcartline")
     */
    private $cartlinecart;

    public function __construct() {
        $this->cartlinecart = new ArrayCollection();
    }
    
}


