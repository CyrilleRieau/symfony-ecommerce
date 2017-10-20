<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * PaymentMode
 *
 * @ORM\Table(name="payment_mode")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaymentModeRepository")
 */
class PaymentMode
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
     * @var \DateTime
     *
     * @ORM\Column(name="facture", type="datetime")
     */
    private $facture;


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
     * Set facture
     *
     * @param \DateTime $facture
     *
     * @return PaymentMode
     */
    public function setFacture($facture)
    {
        $this->facture = $facture;

        return $this;
    }

    /**
     * Get facture
     *
     * @return \DateTime
     */
    public function getFacture()
    {
        return $this->facture;
    }
    /**
     * @ORM\OneToOne(targetEntity="ClientConnected", inversedBy="paymode")
     * @ORM\JoinColumn(name="clientco_id", referencedColumnName="id")
     */
    private $clientcopay;
    /**
     * @ORM\OneToOne(targetEntity="Cart", inversedBy="cartpaymode")
     * @ORM\JoinColumn(name="cart_id", referencedColumnName="id")
     */
    private $cartpay;
}
