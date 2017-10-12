<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Administrator
 *
 * @ORM\Table(name="administrator")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdministratorRepository")
 */
class Administrator
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
     * @ORM\Column(name="adminPassword", type="string", length=255)
     */
    private $adminPassword;


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
     * Set adminPassword
     *
     * @param string $adminPassword
     *
     * @return Administrator
     */
    public function setAdminPassword($adminPassword)
    {
        $this->adminPassword = $adminPassword;

        return $this;
    }

    /**
     * Get adminPassword
     *
     * @return string
     */
    public function getAdminPassword()
    {
        return $this->adminPassword;
    }
}

