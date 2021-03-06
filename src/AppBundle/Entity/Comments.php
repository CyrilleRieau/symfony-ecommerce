<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentsRepository")
 */
class Comments
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
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="numberComment", type="integer")
     */
    private $numberComment;


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
     * Set comment
     *
     * @param string $comment
     *
     * @return Comments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set numberComment
     *
     * @param integer $numberComment
     *
     * @return Comments
     */
    public function setNumberComment($numberComment)
    {
        $this->numberComment = $numberComment;

        return $this;
    }

    /**
     * Get numberComment
     *
     * @return int
     */
    public function getNumberComment()
    {
        return $this->numberComment;
    }
    /**
     * @ORM\ManyToMany(targetEntity="ClientConnected", inversedBy="clientcocom")
     * @ORM\JoinTable(name="clientco_comments")
     */
    private $comclientco;
    
        public function __construct() {
            $this->comclientco = new ArrayCollection();
            $this->comprod = new ArrayCollection();
            
        }
    /**
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="prodcom")
     * @ORM\JoinTable(name="prod_comments")
     */
    private $comprod;


    /**
     * Add comclientco
     *
     * @param \AppBundle\Entity\ClientConnected $comclientco
     *
     * @return Comments
     */
    public function addComclientco(\AppBundle\Entity\ClientConnected $comclientco)
    {
        $this->comclientco[] = $comclientco;

        return $this;
    }

    /**
     * Remove comclientco
     *
     * @param \AppBundle\Entity\ClientConnected $comclientco
     */
    public function removeComclientco(\AppBundle\Entity\ClientConnected $comclientco)
    {
        $this->comclientco->removeElement($comclientco);
    }

    /**
     * Get comclientco
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComclientco()
    {
        return $this->comclientco;
    }

    /**
     * Add comprod
     *
     * @param \AppBundle\Entity\Product $comprod
     *
     * @return Comments
     */
    public function addComprod(\AppBundle\Entity\Product $comprod)
    {
        $this->comprod[] = $comprod;

        return $this;
    }

    /**
     * Remove comprod
     *
     * @param \AppBundle\Entity\Product $comprod
     */
    public function removeComprod(\AppBundle\Entity\Product $comprod)
    {
        $this->comprod->removeElement($comprod);
    }

    /**
     * Get comprod
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComprod()
    {
        return $this->comprod;
    }
}
