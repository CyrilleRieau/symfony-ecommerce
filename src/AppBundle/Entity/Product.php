<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="adding", type="datetime")
     */
    private $adding;

    /**
     * @var bool
     *
     * @ORM\Column(name="isPremium", type="boolean")
     */
    private $isPremium;

    /**
     * @var bool
     *
     * @ORM\Column(name="onSold", type="boolean")
     */
    private $onSold;

    /**
     * @var string
     *
     * @ORM\Column(name="vendor", type="string", length=255)
     */
    private $vendor;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfProducts", type="integer")
     */
    private $numberOfProducts;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfVote", type="integer")
     */
    private $numberOfVote;

  
    /**
     * @var int
     *
     * @ORM\Column(name="numberOfComments", type="integer")
     */
    private $numberOfComments;

    /**
     * @var string
     *
     * @ORM\Column(name="variety", type="string", length=255)
     */
    private $variety;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="seedPeriod", type="datetime")
     */
    private $seedPeriod;

    /**
     * @var string
     *
     * @ORM\Column(name="species", type="string", length=255)
     */
    private $species;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="harvest", type="datetime")
     */
    private $harvest;

    /**
     * @var bool
     *
     * @ORM\Column(name="carving", type="boolean")
     */
    private $carving;

    /**
     * @var bool
     *
     * @ORM\Column(name="treatment", type="boolean")
     */
    private $treatment;

    /**
     * @var string
     *
     * @ORM\Column(name="fertilize", type="string", length=255)
     */
    private $fertilize;


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
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set brand
     *
     * @param string $brand
     *
     * @return Product
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set adding
     *
     * @param \DateTime $adding
     *
     * @return Product
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
     * Set isPremium
     *
     * @param boolean $isPremium
     *
     * @return Product
     */
    public function setIsPremium($isPremium)
    {
        $this->isPremium = $isPremium;

        return $this;
    }

    /**
     * Get isPremium
     *
     * @return bool
     */
    public function getIsPremium()
    {
        return $this->isPremium;
    }

    /**
     * Set onSold
     *
     * @param boolean $onSold
     *
     * @return Product
     */
    public function setOnSold($onSold)
    {
        $this->onSold = $onSold;

        return $this;
    }

    /**
     * Get onSold
     *
     * @return bool
     */
    public function getOnSold()
    {
        return $this->onSold;
    }

    /**
     * Set vendor
     *
     * @param string $vendor
     *
     * @return Product
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;

        return $this;
    }

    /**
     * Get vendor
     *
     * @return string
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Set note
     *
     * @param integer $note
     *
     * @return Product
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set numberOf
     *
     * @param integer $numberOf
     *
     * @return Product
     */
    public function setNumberOf($numberOf)
    {
        $this->numberOf = $numberOf;

        return $this;
    }

    /**
     * Get numberOf
     *
     * @return int
     */
    public function getNumberOf()
    {
        return $this->numberOf;
    }

    /**
     * Set numberOfVote
     *
     * @param integer $numberOfVote
     *
     * @return Product
     */
    public function setNumberOfVote($numberOfVote)
    {
        $this->numberOfVote = $numberOfVote;

        return $this;
    }

    /**
     * Get numberOfVote
     *
     * @return int
     */
    public function getNumberOfVote()
    {
        return $this->numberOfVote;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Product
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
     * Set numberOfComments
     *
     * @param integer $numberOfComments
     *
     * @return Product
     */
    public function setNumberOfComments($numberOfComments)
    {
        $this->numberOfComments = $numberOfComments;

        return $this;
    }

    /**
     * Get numberOfComments
     *
     * @return int
     */
    public function getNumberOfComments()
    {
        return $this->numberOfComments;
    }

    /**
     * Set variety
     *
     * @param string $variety
     *
     * @return Product
     */
    public function setVariety($variety)
    {
        $this->variety = $variety;

        return $this;
    }

    /**
     * Get variety
     *
     * @return string
     */
    public function getVariety()
    {
        return $this->variety;
    }

    /**
     * Set seedPeriod
     *
     * @param \DateTime $seedPeriod
     *
     * @return Product
     */
    public function setSeedPeriod($seedPeriod)
    {
        $this->seedPeriod = $seedPeriod;

        return $this;
    }

    /**
     * Get seedPeriod
     *
     * @return \DateTime
     */
    public function getSeedPeriod()
    {
        return $this->seedPeriod;
    }

   
    /**
     * Set species
     *
     * @param string $species
     *
     * @return Product
     */
    public function setSpecies($species)
    {
        $this->species = $species;

        return $this;
    }

    /**
     * Get species
     *
     * @return string
     */
    public function getSpecies()
    {
        return $this->species;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Product
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set harvest
     *
     * @param \DateTime $harvest
     *
     * @return Product
     */
    public function setHarvest($harvest)
    {
        $this->harvest = $harvest;

        return $this;
    }

    /**
     * Get harvest
     *
     * @return \DateTime
     */
    public function getHarvest()
    {
        return $this->harvest;
    }

    /**
     * Set carving
     *
     * @param boolean $carving
     *
     * @return Product
     */
    public function setCarving($carving)
    {
        $this->carving = $carving;

        return $this;
    }

    /**
     * Get carving
     *
     * @return bool
     */
    public function getCarving()
    {
        return $this->carving;
    }

    /**
     * Set treatment
     *
     * @param boolean $treatment
     *
     * @return Product
     */
    public function setTreatment($treatment)
    {
        $this->treatment = $treatment;

        return $this;
    }

    /**
     * Get treatment
     *
     * @return bool
     */
    public function getTreatment()
    {
        return $this->treatment;
    }

    /**
     * Set fertilize
     *
     * @param string $fertilize
     *
     * @return Product
     */
    public function setFertilize($fertilize)
    {
        $this->fertilize = $fertilize;

        return $this;
    }

    /**
     * Get fertilize
     *
     * @return string
     */
    public function getFertilize()
    {
        return $this->fertilize;
    }
}
