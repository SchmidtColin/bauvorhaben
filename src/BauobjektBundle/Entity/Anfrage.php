<?php

namespace BauobjektBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Anfrage
 *
 * @ORM\Table(name="anfrage")
 * @ORM\Entity(repositoryClass="BauobjektBundle\Repository\AnfrageRepository")
 */
class Anfrage
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
     * @var string
     *
     * @ORM\Column(name="Menge", type="string", length=255)
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
     * @return Anfrage
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
     * @param string $menge
     *
     * @return Anfrage
     */
    public function setMenge($menge)
    {
        $this->menge = $menge;

        return $this;
    }

    /**
     * Get menge
     *
     * @return string
     */
    public function getMenge()
    {
        return $this->menge;
    }
}

