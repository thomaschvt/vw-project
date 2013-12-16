<?php

namespace VintageWest\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Language
 *
 * @ORM\Table(name="language")
 * @ORM\Entity(repositoryClass="VintageWest\AdminBundle\Repository\LanguageRepository")
 */
class Language
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="shorten", type="string", length=3)
     */
    private $shorten;

    /**
     * @var string
     *
     * @ORM\Column(name="img_url", type="string", length=255)
     */
    private $imgUrl;

    /**
     * @ORM\OneToMany(targetEntity="News", mappedBy="desk")
     */
    protected $news;

    /**
     * @ORM\OneToMany(targetEntity="Car", mappedBy="cars")
     */
    protected $cars;

    /**
     * @ORM\OneToMany(targetEntity="Equipement", mappedBy="equipements")
     */
    protected $equipement;

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
     * Set name
     *
     * @param string $name
     * @return Language
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
     * Set shorten
     *
     * @param string $shorten
     * @return Language
     */
    public function setShorten($shorten)
    {
        $this->shorten = $shorten;

        return $this;
    }

    /**
     * Get shorten
     *
     * @return string 
     */
    public function getShorten()
    {
        return $this->shorten;
    }

    public function __toString(){
        return $this->name;
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

}
