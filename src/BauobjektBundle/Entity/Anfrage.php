<?php

namespace BauobjektBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Anfrage
 *
 * @ORM\Table(name="anfrage", uniqueConstraints={@ORM\UniqueConstraint(name="fk_user_id", columns={"fk_user_id"})})
 * @ORM\Entity
 */
class Anfrage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Beschreibung", type="string", length=255, nullable=false)
     */
    private $beschreibung;

    /**
     * @var string
     *
     * @ORM\Column(name="Menge", type="string", length=255, nullable=false)
     */
    private $menge;

    /**
     * @var \BauobjektBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BauobjektBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_user_id", referencedColumnName="id")
     * })
     */
    private $fkUser;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    /**
     * @param string $beschreibung
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;
    }

    /**
     * @return string
     */
    public function getMenge()
    {
        return $this->menge;
    }

    /**
     * @param string $menge
     */
    public function setMenge($menge)
    {
        $this->menge = $menge;
    }

    /**
     * @param User $fkUser
     */
    public function setFkUser($fkUser)
    {
        $this->fkUser = $fkUser;
    }

    /**
     * @return User
     */
    public function getFkUser()
    {
        return $this->fkUser;
    }


}

