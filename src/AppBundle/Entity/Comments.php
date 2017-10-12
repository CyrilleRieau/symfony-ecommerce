<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
            $this->comclientco = new \Doctrine\Common\Collections\ArrayCollection();
        }
    
}

