<?php

namespace CRA\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Personne
 *
 * @ORM\Table(name="Historique")
 * @ORM\Entity(repositoryClass="CRA\AdminBundle\Repository\PersonneRepository")
 */
class Historique
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
     * @ORM\Column(name="typeabsence", type="string", length=30)
     */
    private $typeabsence;

    /**
     * @var string
     *
     * @ORM\Column(name="heurd", type="string", length=30)
     */


    private $heurd;

    /**
     * @var string
     *
     * @ORM\Column(name="heurf", type="string", length=30)
     */
    private $heurf;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;



    /**
     * @var string
     *
     * @ORM\Column(name="loctravail", type="string", length=30)
     */
    private $loctravail;

    /**
     * @ORM\ManyToOne(targetEntity="CRA\AdminBundle\Entity\Projet")
     * @Assert\NotBlank(message="Valeur obligatoire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nomprojet;

    /**
     * @ORM\ManyToOne(targetEntity="CRA\UserBundle\Entity\User")
     * @Assert\NotBlank(message="Valeur obligatoire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }



    /**
     * @var string
     * @ORM\Column(name="natintervention", type="string", length=250)
     */
    private $natintervention;

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
     * Set typeabsence
     *
     * @param string $typeabsence
     *
     * @return Historique
     */
    public function setTypeabsence($typeabsence)
    {
        $this->typeabsence = $typeabsence;

        return $this;
    }

    /**
     * Get typeabsence
     *
     * @return string
     */
    public function getTypeabsence()
    {
        return $this->typeabsence;
    }

    /**
     * Set heurd
     *
     * @param string $heurd
     *
     * @return Personne
     */
    public function setHeurD($heurd)
    {
        $this->heurd = $heurd;

        return $this;
    }

    /**
     * Get heurd
     *
     * @return string
     */
    public function getHeurD()
    {
        return $this->heurd;
    }

    /**
     * Set heurf
     *
     * @param string $heurf
     *
     * @return Historique
     */
    public function setHeurF($heurf)
    {
        $this->heurf = $heurf;

        return $this;
    }

    /**
     * Get heurf
     *
     * @return string
     */
    public function getHeurf()
    {
        return $this->heurf;
    }

    /**
     * Set date
     *
     * @param date $date
     *
     * @return Historique
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return date
     */
    public function getDate()
    {
        return $this->date;
    }




    /**
     * Set loctravail
     *
     * @param string $loctravail
     *
     * @return Historique
     */
    public function setLoctravail($loctravail)
    {
        $this->loctravail = $loctravail;

        return $this;
    }

    /**
     * Get typeabsence
     *
     * @return string
     */
    public function getLoctravail()
    {
        return $this->loctravail;
    }

    /**
     * Set nomprojet
     *
     * @param string $nomprojet
     *
     * @return Historique
     */
    public function setNomprojet($nomprojet)
    {
        $this->nomprojet = $nomprojet;

        return $this;
    }

    /**
     * Get nomprojet
     *
     * @return string
     */
    public function getNomprojet()
    {
        return $this->nomprojet;
    }

    /**
     * Set natintervention
     *
     * @param string idsalarie
     *
     * @return Historique
     */
    public function setNatintervention($natintervention)
    {
        $this->natintervention = $natintervention;

        return $this;
    }

    /**
     * Get natintervention
     *
     * @return string
     */
    public function getNatintervention()
    {
        return $this->natintervention;
    }

    public function __toString() {
        return $this->nomprojet;
    }

}
