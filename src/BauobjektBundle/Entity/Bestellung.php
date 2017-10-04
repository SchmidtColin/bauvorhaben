<?php

namespace BauobjektBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bestellung
 *
 * @ORM\Table(name="bauobjekt")
 * @ORM\Entity(repositoryClass="BauobjektBundle\Repository\BauobjektRepository")
 */
class Bestellung
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
     * @ORM\Column(name="Beschreibung", type="string", length=255)
     */
    private $beschreibung;

    /**
     * @var int
     *
     * @ORM\Column(name="Menge", type="integer")
     */
    private $menge;


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
     * Set beschreibung
     *
     * @param string $beschreibung
     *
     * @return Bestellung
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;

        return $this;
    }

    /**
     * Get beschreibung
     *
     * @return string
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    /**
     * Set menge
     *
     * @param integer $menge
     *
     * @return Bestellung
     */
    public function setMenge($menge)
    {
        $this->menge = $menge;

        return $this;
    }

    /**
     * Get menge
     *
     * @return int
     */
    public function getMenge()
    {
        return $this->menge;
    }
}

