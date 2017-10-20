<?php

namespace AppBundle\Entity;

/**
 * Listpro
 */
class Listpro
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var array
     */
    private $listpro;


    /**
     * Get id
     *
     * @return integer
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

