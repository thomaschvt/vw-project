<?php

namespace VintageWest\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageIllustration
 *
 * @ORM\Table(name="image_illustration")
 * @ORM\Entity(repositoryClass="VintageWest\AdminBundle\Repository\ImageIllustrationRepository")
 */
class ImageIllustration
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
     * @ORM\Column(name="title_fr", type="string", length=255)
     */
    private $titleFr;

    /**
     * @var string
     *
     * @ORM\Column(name="title_en", type="string", length=255)
     */
    private $titleEn;

    /**
     * @var string
     *
     * @ORM\Column(name="title_es", type="string", length=255)
     */
    private $titleEs;

    /**
     * @var string
     *
     * @ORM\Column(name="alt_fr", type="string", length=255)
     */
    private $altFr;

    /**
     * @var string
     *
     * @ORM\Column(name="alt_en", type="string", length=255)
     */
    private $altEn;

    /**
     * @var string
     *
     * @ORM\Column(name="alt_es", type="string", length=255)
     */
    private $altEs;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_in_carrousel", type="boolean", nullable=true)
     */
    private $isInCarrousel;

    /**
     * @ORM\ManyToMany(targetEntity="Car", mappedBy="imgIllustration")
     */
    private $cars;

    public function __construct() {
        $this->cars = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titleFr
     *
     * @param string $titleFr
     * @return ImageIllustration
     */
    public function setTitleFr($titleFr)
    {
        $this->titleFr = $titleFr;

        return $this;
    }

    /**
     * Get titleFr
     *
     * @return string 
     */
    public function getTitleFr()
    {
        return $this->titleFr;
    }

    /**
     * Set titleEn
     *
     * @param string $titleEn
     * @return ImageIllustration
     */
    public function setTitleEn($titleEn)
    {
        $this->titleEn = $titleEn;

        return $this;
    }

    /**
     * Get titleEn
     *
     * @return string 
     */
    public function getTitleEn()
    {
        return $this->titleEn;
    }

    /**
     * Set titleEs
     *
     * @param string $titleEs
     * @return ImageIllustration
     */
    public function setTitleEs($titleEs)
    {
        $this->titleEs = $titleEs;

        return $this;
    }

    /**
     * Get titleEs
     *
     * @return string 
     */
    public function getTitleEs()
    {
        return $this->titleEs;
    }

    /**
     * Set altFr
     *
     * @param string $altFr
     * @return ImageIllustration
     */
    public function setAltFr($altFr)
    {
        $this->altFr = $altFr;

        return $this;
    }

    /**
     * Get altFr
     *
     * @return string 
     */
    public function getAltFr()
    {
        return $this->altFr;
    }

    /**
     * Set altEn
     *
     * @param string $altEn
     * @return ImageIllustration
     */
    public function setAltEn($altEn)
    {
        $this->altEn = $altEn;

        return $this;
    }

    /**
     * Get altEn
     *
     * @return string 
     */
    public function getAltEn()
    {
        return $this->altEn;
    }

    /**
     * Set altEs
     *
     * @param string $altEs
     * @return ImageIllustration
     */
    public function setAltEs($altEs)
    {
        $this->altEs = $altEs;

        return $this;
    }

    /**
     * Get altEs
     *
     * @return string 
     */
    public function getAltEs()
    {
        return $this->altEs;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return ImageIllustration
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set isInCarrousel
     *
     * @param boolean $isInCarrousel
     * @return ImageIllustration
     */
    public function setIsInCarrousel($isInCarrousel)
    {
        $this->isInCarrousel = $isInCarrousel;

        return $this;
    }

    /**
     * Get isInCarrousel
     *
     * @return boolean 
     */
    public function getIsInCarrousel()
    {
        return $this->isInCarrousel;
    }

    public function __toString(){
        return $this->titleFr;
    }
}
