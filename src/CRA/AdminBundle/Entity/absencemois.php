<?php

namespace CRA\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * cramois
 *
 * @ORM\Table(name="absencemois")
 * @ORM\Entity(repositoryClass="CRA\AdminBundle\Repository\absenceRepository")
 */
class absencemois
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
     * @ORM\Column(name="dated", type="string", length=30)
     */
    private $dated;
    /**
     * @var string
     *
     * @ORM\Column(name="datef", type="string", length=30)
     */
    private $datef;

    /**
     * @var String
     *
     * @ORM\Column(name="statue", type="string", length=1)
     */
    private $statue;

    /**
     * @var String
     *
     * @ORM\Column(name="typeabsence", type="string", length=30)
     */
    private $typeabsence;

    /**
     * @ORM\ManyToOne(targetEntity="CRA\AdminBundle\Entity\cramois")
     * @Assert\NotBlank(message="Valeur obligatoire")
     * @ORM\JoinColumn(nullable=false)
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
    public function getStatue()
    {
        return $this->statue;
    }

    /**
     * @param String $statue
     */
    public function setStatue($statue)
    {
        $this->statue = $statue;
    }

    /**
     * @return String
     */
    public function getTypeabsence()
    {
        return $this->typeabsence;
    }

    /**
     * @param String $typeabsence
     */
    public function setTypeabsence($typeabsence)
    {
        $this->typeabsence = $typeabsence;
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
