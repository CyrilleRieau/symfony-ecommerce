<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paypal
 *
 * @ORM\Table(name="paypal")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaypalRepository")
 */
class Paypal
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
     * @ORM\Column(name="countNumber", type="integer")
     */
    private $countNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;


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
     * Set countNumber
     *
     * @param integer $countNumber
     *
     * @return Paypal
     */
    public function setCountNumber($countNumber)
    {
        $this->countNumber = $countNumber;

        return $this;
    }

    /**
     * Get countNumber
     *
     * @return int
     */
    public function getCountNumber()
    {
        return $this->countNumber;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Paypal
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}

