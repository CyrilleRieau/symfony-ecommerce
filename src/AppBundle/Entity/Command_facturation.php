<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Command_facturation
 *
 * @ORM\Table(name="command_facturation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Command_facturationRepository")
 */
class Command_facturation
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
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="tvaPrice", type="float")
     */
    private $tvaPrice;

    /**
     * @var float
     *
     * @ORM\Column(name="withouttvaPrice", type="float")
     */
    private $withouttvaPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="facturationaDDress", type="string", length=255)
     */
    private $facturationaDDress;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="commandDate", type="datetime")
     */
    private $commandDate;

    /**
     * @var string
     *
     * @ORM\Column(name="commandAddress", type="string", length=255)
     */
    private $commandAddress;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Command_facturation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set tvaPrice
     *
     * @param float $tvaPrice
     *
     * @return Command_facturation
     */
    public function setTvaPrice($tvaPrice)
    {
        $this->tvaPrice = $tvaPrice;

        return $this;
    }

    /**
     * Get tvaPrice
     *
     * @return float
     */
    public function getTvaPrice()
    {
        return $this->tvaPrice;
    }

    /**
     * Set withouttvaPrice
     *
     * @param float $withouttvaPrice
     *
     * @return Command_facturation
     */
    public function setWithouttvaPrice($withouttvaPrice)
    {
        $this->withouttvaPrice = $withouttvaPrice;

        return $this;
    }

    /**
     * Get withouttvaPrice
     *
     * @return float
     */
    public function getWithouttvaPrice()
    {
        return $this->withouttvaPrice;
    }

    /**
     * Set facturationaDDress
     *
     * @param string $facturationaDDress
     *
     * @return Command_facturation
     */
    public function setFacturationaDDress($facturationaDDress)
    {
        $this->facturationaDDress = $facturationaDDress;

        return $this;
    }

    /**
     * Get facturationaDDress
     *
     * @return string
     */
    public function getFacturationaDDress()
    {
        return $this->facturationaDDress;
    }

    /**
     * Set commandDate
     *
     * @param \DateTime $commandDate
     *
     * @return Command_facturation
     */
    public function setCommandDate($commandDate)
    {
        $this->commandDate = $commandDate;

        return $this;
    }

    /**
     * Get commandDate
     *
     * @return \DateTime
     */
    public function getCommandDate()
    {
        return $this->commandDate;
    }

    /**
     * Set commandAddress
     *
     * @param string $commandAddress
     *
     * @return Command_facturation
     */
    public function setCommandAddress($commandAddress)
    {
        $this->commandAddress = $commandAddress;

        return $this;
    }

    /**
     * Get commandAddress
     *
     * @return string
     */
    public function getCommandAddress()
    {
        return $this->commandAddress;
    }
}

