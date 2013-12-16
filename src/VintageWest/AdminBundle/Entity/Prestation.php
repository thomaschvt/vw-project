<?php

namespace VintageWest\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prestation
 *
 * @ORM\Table(name="prestation")
 * @ORM\Entity(repositoryClass="VintageWest\AdminBundle\Entity\PrestationRepository")
 */
class Prestation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_event", type="boolean")
     */
    private $isEvent;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration_days", type="integer")
     */
    private $durationDays;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=512)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="lang", type="integer")
     */
    private $lang;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="img_url", type="string", length=512)
     */
    private $imgUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="linked_combi", type="string", length=64)
     */
    private $linkedCombi;


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
     * Set isEvent
     *
     * @param boolean $isEvent
     * @return Prestation
     */
    public function setIsEvent($isEvent)
    {
        $this->isEvent = $isEvent;

        return $this;
    }

    /**
     * Get isEvent
     *
     * @return boolean 
     */
    public function getIsEvent()
    {
        return $this->isEvent;
    }

    /**
     * Set durationDays
     *
     * @param integer $durationDays
     * @return Prestation
     */
    public function setDurationDays($durationDays)
    {
        $this->durationDays = $durationDays;

        return $this;
    }

    /**
     * Get durationDays
     *
     * @return integer 
     */
    public function getDurationDays()
    {
        return $this->durationDays;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Prestation
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
     * Set description
     *
     * @param string $description
     * @return Prestation
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
     * Set lang
     *
     * @param integer $lang
     * @return Prestation
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return integer 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Prestation
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
     * Set imgUrl
     *
     * @param string $imgUrl
     * @return Prestation
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    /**
     * Get imgUrl
     *
     * @return string 
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * Set linkedCombi
     *
     * @param string $linkedCombi
     * @return Prestation
     */
    public function setLinkedCombi($linkedCombi)
    {
        $this->linkedCombi = $linkedCombi;

        return $this;
    }

    /**
     * Get linkedCombi
     *
     * @return string 
     */
    public function getLinkedCombi()
    {
        return $this->linkedCombi;
    }
}
