<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CheckMode
 *
 * @ORM\Table(name="check_mode")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CheckModeRepository")
 */
class CheckMode
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
     * @ORM\Column(name="orderperson", type="string", length=255)
     */
    private $orderperson;


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
     * Set orderperson
     *
     * @param string $orderperson
     *
     * @return CheckMode
     */
    public function setOrderperson($orderperson)
    {
        $this->orderperson = $orderperson;

        return $this;
    }

    /**
     * Get orderperson
     *
     * @return string
     */
    public function getOrderperson()
    {
        return $this->orderperson;
    }
}

