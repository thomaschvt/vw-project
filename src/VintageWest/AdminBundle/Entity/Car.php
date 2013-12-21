<?php

namespace VintageWest\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="VintageWest\AdminBundle\Repository\CarRepository")
 */
class Car
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
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="dimension", type="string", length=255)
     */
    private $dimension;

    /**
     * @var string
     *
     * @ORM\Column(name="engine", type="string", length=255)
     */
    private $engine;

    /**
     * @var string
     *
     * @ORM\Column(name="carburation", type="string", length=255)
     */
    private $carburation;

    /**
     * @var string
     *
     * @ORM\Column(name="consumption", type="string", length=255)
     */
    private $consumption;

    /**
     * @var string
     *
     * @ORM\Column(name="speed", type="string", length=255)
     */
    private $speed;

    /**
     * @var integer
     *
     * @ORM\Column(name="sleeping", type="integer")
     */
    private $sleeping;

    /**
     * @var integer
     *
     * @ORM\Column(name="seats", type="integer")
     */
    private $seats;

    /**
     * @var string
     *
     * @ORM\Column(name="img_url", type="string", length=255)
     */
    private $imgUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="ImageIllustration", inversedBy="cars")
     * @ORM\JoinTable(name="cars_img_illustration")
     */
    private $imgIllustration;

    /**
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="cars")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id")
     */
    protected $lang;

    /**
     * @ORM\ManyToMany(targetEntity="Prestation", mappedBy="linkedCombi")
     */
    private  $linkedCombi;

    public function __construct() {
        $this->imgIllustration = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set model
     *
     * @param string $model
     * @return Car
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return Car
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set dimension
     *
     * @param string $dimension
     * @return Car
     */
    public function setDimension($dimension)
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * Get dimension
     *
     * @return string 
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * Set engine
     *
     * @param string $engine
     * @return Car
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * Get engine
     *
     * @return string 
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Set carburation
     *
     * @param string $carburation
     * @return Car
     */
    public function setCarburation($carburation)
    {
        $this->carburation = $carburation;

        return $this;
    }

    /**
     * Get carburation
     *
     * @return string 
     */
    public function getCarburation()
    {
        return $this->carburation;
    }

    /**
     * Set consumption
     *
     * @param string $consumption
     * @return Car
     */
    public function setConsumption($consumption)
    {
        $this->consumption = $consumption;

        return $this;
    }

    /**
     * Get consumption
     *
     * @return string 
     */
    public function getConsumption()
    {
        return $this->consumption;
    }

    /**
     * Set speed
     *
     * @param string $speed
     * @return Car
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get speed
     *
     * @return string 
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set sleeping
     *
     * @param integer $sleeping
     * @return Car
     */
    public function setSleeping($sleeping)
    {
        $this->sleeping = $sleeping;

        return $this;
    }

    /**
     * Get sleeping
     *
     * @return integer 
     */
    public function getSleeping()
    {
        return $this->sleeping;
    }

    /**
     * Set seats
     *
     * @param integer $seats
     * @return Car
     */
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    /**
     * Get seats
     *
     * @return integer 
     */
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * Set imgUrl
     *
     * @param string $imgUrl
     * @return Car
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
     * Set description
     *
     * @param string $description
     * @return Car
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get descriptionFr
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }



    public function getImgIllustration(){
        return $this->imgIllustration;
    }

    public function __toString(){
        return $this->model;
    }

    /**
     * Get language
     */
    public function getLang(){
        return $this->lang;
    }

    /**
     * Set language
     */
    public function setLang($lang){
        $this->lang = $lang;
    }
}
