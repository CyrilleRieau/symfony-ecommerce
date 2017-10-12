<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listpro
 *
 * @ORM\Table(name="listpro")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ListproRepository")
 */
class Listpro
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
     * @var array
     *
     * @ORM\Column(name="listpro", type="array")
     */
    private $listpro;


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
     * Set listpro
     *
     * @param array $listpro
     *
     * @return Listpro
     */
    public function setListpro($listpro)
    {
        $this->listpro = $listpro;

        return $this;
    }

    /**
     * Get listpro
     *
     * @return array
     */
    public function getListpro()
    {
        return $this->listpro;
    }
}

