<?php

namespace BauobjektBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Anfrage
 *
 * @ORM\Table(name="anfrage")
 * @ORM\Entity(repositoryClass="BauobjektBundle\Repository\AnfrageRepository")
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
     * @ORM\Column(name="Bestellung", type="string", length=255, nullable=false)
     */
    private $bestellung;


    /**
     * @var string
     *
     * @ORM\Column(name="Menge", type="string", length=255, nullable=false)
     */
    private $menge;

    /**
     * @var string
     *
     * @ORM\Column(name="Bemerkung", type="string", length=255, nullable=true)
     */
    private $bemerkung = '-';


    /**
     * @var \BauobjektBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="BauobjektBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_user_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $fkUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="Genehmigt", type="integer", nullable=false)
     * @Assert\Range(
     *     min="0",
     *     max="2"
     * )
     */
    private $genehmigt = 1;

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
    public function getBestellung()
    {
        return $this->bestellung;
    }

    /**
     * @param string $bestellung
     */
    public function setBestellung($bestellung)
    {
        $this->bestellung = $bestellung;
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
     * @return string
     */
    public function getBemerkung()
    {
        return $this->bemerkung;
    }

    /**
     * @param string $bemerkung
     */
    public function setBemerkung($bemerkung)
    {
        $this->bemerkung = $bemerkung;
    }

    /**
     * @return User
     */
    public function getFkUser()
    {
        return $this->fkUser;
    }

    /**
     * @param User $fkUser
     */
    public function setFkUser($fkUser)
    {
        $this->fkUser = $fkUser;
    }

    /**
     * @return int
     */
    public function getGenehmigt()
    {
        return $this->genehmigt;
    }

    /**
     * @param int $genehmigt
     */
    public function setGenehmigt($genehmigt)
    {
        $this->genehmigt = $genehmigt;
    }


}

