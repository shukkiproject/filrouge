<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity(repositoryClass="SiteBundle\Repository\PersonRepository")
 */
class Person
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
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $character;

    /**
     * @var string
     * @ORM\ManyToMany(targetEntity="Series", mappedBy="persons")
     * 
     */
    private $series;

    /**
     * @var boolean
     *
     * @ORM\Column(name="validated", type="boolean", nullable=true)
     */
    private $validated;

    /**
     * @var int
     *
     * @ORM\Column(name="oldId", type="integer", nullable=true)
     */
    private $oldId;

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
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Person
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Person
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return Person
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    public function __toString() {
        return $this->firstname." ".$this->lastname;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->series = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add series
     *
     * @param \SiteBundle\Entity\Series $series
     *
     * @return Person
     */
    public function addSeries(\SiteBundle\Entity\Series $series)
    {
        if (!$this->series->contains($series)) {
            $this->series[] = $series;
        }
        return $this;
    }

    /**
     * Remove series
     *
     * @param \SiteBundle\Entity\Series $series
     */
    public function removeSeries(\SiteBundle\Entity\Series $series)
    {
        $this->series->removeElement($series);
    }

    /**
     * Get series
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set character
     *
     * @param string $character
     *
     * @return Person
     */
    public function setCharacter($character)
    {
        $this->character = $character;

        return $this;
    }

    /**
     * Get character
     *
     * @return string
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * Set validated
     *
     * @param boolean $validated
     *
     * @return Person
     */
    public function setValidated($validated)
    {
        $this->validated = $validated;

        return $this;
    }

    /**
     * Get validated
     *
     * @return boolean
     */
    public function getValidated()
    {
        return $this->validated;
    }

    /**
     * Set oldId
     *
     * @param integer $oldId
     *
     * @return Person
     */
    public function setOldId($oldId)
    {
        $this->oldId = $oldId;

        return $this;
    }

    /**
     * Get oldId
     *
     * @return integer
     */
    public function getOldId()
    {
        return $this->oldId;
    }

    /**
     * Set series
     *
     * @param \SiteBundle\Entity\Series $series
     *
     * @return Person
     */
    public function setSeries(\SiteBundle\Entity\Series $series = null)
    {
        $this->series = $series;

        return $this;
    }
}
