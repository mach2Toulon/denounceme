<?php

namespace dme\DenounceMeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="dme\DenounceMeBundle\Entity\PostRepository")
 */
class Post
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
     * @ORM\Column(name="from_pseudo", type="string", length=255, nullable=true)
     */
    private $from_pseudo;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ORM\Column(name="to_pseudo", type="string", length=255)
     */
    private $to_pseudo;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Type("string")
     * @ORM\Column(name="denounce", type="text")
     */
    private $denounce;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     * @Assert\Type("datetime")
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;
    
    
    public function __construct() {
      $this->created_at = new \DateTime('now');
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
      return $this->id;
    }

    /**
     * Set from_pseudo
     *
     * @param string $fromPseudo
     * @return Post
     */
    public function setFromPseudo($fromPseudo)
    {
        $this->from_pseudo = $fromPseudo;
    
        return $this;
    }

    /**
     * Get from_pseudo
     *
     * @return string 
     */
    public function getFromPseudo()
    {
        return $this->from_pseudo;
    }

    /**
     * Set to_pseudo
     *
     * @param string $toPseudo
     * @return Post
     */
    public function setToPseudo($toPseudo)
    {
        $this->to_pseudo = $toPseudo;
    
        return $this;
    }

    /**
     * Get to_pseudo
     *
     * @return string 
     */
    public function getToPseudo()
    {
        return $this->to_pseudo;
    }

    /**
     * Set denounce
     *
     * @param string $denounce
     * @return Post
     */
    public function setDenounce($denounce)
    {
        $this->denounce = $denounce;
    
        return $this;
    }

    /**
     * Get denounce
     *
     * @return string 
     */
    public function getDenounce()
    {
        return $this->denounce;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Post
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }
}