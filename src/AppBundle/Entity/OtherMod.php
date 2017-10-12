<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OtherMod
 *
 * @ORM\Table(name="other_mod")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OtherModRepository")
 */
class OtherMod
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
     * @ORM\Column(name="cash", type="integer")
     */
    private $cash;

    /**
     * @var int
     *
     * @ORM\Column(name="levy", type="integer")
     */
    private $levy;

    /**
     * @var int
     *
     * @ORM\Column(name="transfer", type="integer")
     */
    private $transfer;


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
     * Set cash
     *
     * @param integer $cash
     *
     * @return OtherMod
     */
    public function setCash($cash)
    {
        $this->cash = $cash;

        return $this;
    }

    /**
     * Get cash
     *
     * @return int
     */
    public function getCash()
    {
        return $this->cash;
    }

    /**
     * Set levy
     *
     * @param integer $levy
     *
     * @return OtherMod
     */
    public function setLevy($levy)
    {
        $this->levy = $levy;

        return $this;
    }

    /**
     * Get levy
     *
     * @return int
     */
    public function getLevy()
    {
        return $this->levy;
    }

    /**
     * Set transfer
     *
     * @param integer $transfer
     *
     * @return OtherMod
     */
    public function setTransfer($transfer)
    {
        $this->transfer = $transfer;

        return $this;
    }

    /**
     * Get transfer
     *
     * @return int
     */
    public function getTransfer()
    {
        return $this->transfer;
    }
}

