<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WishList
 *
 * @ORM\Table(name="wish_list")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WishListRepository")
 */
class WishList
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
     * @ORM\Column(name="adding", type="datetime")
     */
    private $adding;

    /**
     * @var array
     *
     * @ORM\Column(name="list", type="array")
     */
    private $list;


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
     * Set adding
     *
     * @param \DateTime $adding
     *
     * @return WishList
     */
    public function setAdding($adding)
    {
        $this->adding = $adding;

        return $this;
    }

    /**
     * Get adding
     *
     * @return \DateTime
     */
    public function getAdding()
    {
        return $this->adding;
    }

    /**
     * Set list
     *
     * @param array $list
     *
     * @return WishList
     */
    public function setList($list)
    {
        $this->list = $list;

        return $this;
    }

    /**
     * Get list
     *
     * @return array
     */
    public function getList()
    {
        return $this->list;
    }
}

