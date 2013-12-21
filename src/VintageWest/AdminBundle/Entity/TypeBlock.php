<?php

namespace VintageWest\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeBlock
 *
 * @ORM\Table(name="typeBlock")
 * @ORM\Entity(repositoryClass="VintageWest\AdminBundle\Repository\TypeBlockRepository")
 */
class TypeBlock
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
     * @ORM\OneToMany(targetEntity="Block", mappedBy="blocks")
     */
    protected $blocks;

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
     * @return TypeBlock
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
     * Set blocks
     *
     * @param string $blocks
     * @return TypeBlock
     */
    public function setBlocks($blocks)
    {
        $this->blocks = $blocks;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    public function __toString(){
        return $this->name;
    }
}
