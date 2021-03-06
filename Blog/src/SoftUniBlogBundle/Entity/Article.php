<?php

namespace SoftUniBlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity(repositoryClass="SoftUniBlogBundle\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;
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
     * Set title
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAdded", type="datetime")
     */
    private $dateAdded;
    /**
     * @var string
     */
    private $summary;
    /**
     * @param string
     */
    private function setSummary()
    {
        $this->summary =substr($this->getContent(),0,strlen($this->getContent())/2) . "...";
    }
    /**
     * @return string
     */
    public function getSummary()
    {   if($this->summary === null)
    {
        $this->setSummary();
    }
        return $this->summary;
    }
    /**
     * @var int
     *
     * @ORM\Column(name = "authorId",type="integer")
     */
    private $authorId;

    /**
     * @param integer $authorId
     *
     * @return Article
     */

    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;
        return $this;
    }
    /**
     * @return int
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="SoftUniBlogBundle\Entity\User", inversedBy="articles")
     * @ORM\JoinColumn(name="authorId",referencedColumnName="id")
     */
    private $author;
    /**
     * @param \SoftUniBlogBundle\Entity\User $author
     *
     * @return Article
     */
    public function setAuthor(User $author = null)
    {
        $this->author = $author;

        return $this;
    }
    /**
     * @return \SoftUniBlogBundle\Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    public function  __construct()
    {
        $this->dateAdded = new \DateTime('now');
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return \DateTime
     */
    public function getDateAdded(): \DateTime
    {
        return $this->dateAdded;
    }

    /**
     * @param \DateTime $dateAdded
     */
    public function setDateAdded(\DateTime $dateAdded)
    {
        $this->dateAdded = $dateAdded;
    }
//php bin/console doctrine:schema:update --force


}


