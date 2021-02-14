<?php

namespace CRA\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * cramois
 *
 * @ORM\Table(name="projetmois")
 * @ORM\Entity(repositoryClass="CRA\AdminBundle\Repository\projetmoisRepository")
 */
class projetmois
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
     * @ORM\ManyToOne(targetEntity="CRA\AdminBundle\Entity\Projet")
     * @Assert\NotBlank(message="Valeur obligatoire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nomprojet;

    /**
     * @var string
     *
     * @ORM\Column(name="dated",  type="datetime")
     */
    private $dated;
    /**
     * @var string
     *
     * @ORM\Column(name="datef",  type="datetime")
     */
    private $datef;
    /**
     * @var String
     *
     * @ORM\Column(name="descp", type="string", length=30)
     */
    private $descp;


    /**
     * @ORM\ManyToOne(targetEntity="CRA\AdminBundle\Entity\cramois", inversedBy="projets")
     * @ORM\JoinColumn(name="cramois_id", referencedColumnName="id")
     */
    private $cramois;



    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNomprojet()
    {
        return $this->nomprojet;
    }

    /**
     * @param mixed $nomprojet
     */
    public function setNomprojet($nomprojet)
    {
        $this->nomprojet = $nomprojet;
    }

    /**
     * @return string
     */
    public function getDated()
    {
        return $this->dated;
    }

    /**
     * @param string $dated
     */
    public function setDated($dated)
    {
        $this->dated = $dated;
    }

    /**
     * @return string
     */
    public function getDatef()
    {
        return $this->datef;
    }

    /**
     * @param string $datef
     */
    public function setDatef($datef)
    {
        $this->datef = $datef;
    }

    /**
     * @return String
     */
    public function getDescp()
    {
        return $this->descp;
    }

    /**
     * @param String $descp
     */
    public function setDescp($descp)
    {
        $this->descp = $descp;
    }

    /**
     * @return mixed
     */
    public function getCramois()
    {
        return $this->cramois;
    }

    /**
     * @param mixed $cramois
     */
    public function setCramois($cramois)
    {
        $this->cramois = $cramois;
    }


}
