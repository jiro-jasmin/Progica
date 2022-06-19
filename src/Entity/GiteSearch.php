<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class GiteSearch
{
    /**
     * @var ArrayCollection
     * 
     */
    private $region;

    /**
     * @var ArrayCollection
     * 
     */
    private $equipement;

    public function __construct()
    {
        $this->equipement = new ArrayCollection();
        $this->region = new ArrayCollection();
    
    }
    /**
     * @var int|null
     * @Assert\Range(
     *          min=30,
     *          max=300,
     *          minMessage = "Merci d'entrer une valeur au dessus de {{ min }} m².",
     *          maxMessage = "Merci d'entrer une valeur en dessous de {{ max }} m²."
     * )
     */
    private $minSurface;

    /**
     * @var int|null
     * @Assert\Range(
     *          min=1,
     *          max=100
     * )
     */
    private $minChambre;

    /**
     * @var int|null
     * @Assert\Range(
     *          min=1,
     *          max=100
     * )
     */
    private $minCouchage;

      /**
     * @var float|null
     * @Assert\Range(
     *          min=50,
     *          max=1000,
     *          minMessage = "Les tarifs commencent à 50€.",
     *          maxMessage = "Merci d'indiquer une valeur inférieure à 1000€."
     * )
     */
    private $maxTarif;


    

    /**
     * Get the value of minSurface
     */ 
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @return  self
     */ 
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of minChambre
     */ 
    public function getMinChambre(): ?int
    {
        return $this->minChambre;
    }

    /**
     * Set the value of minChambre
     *
     * @return  self
     */ 
    public function setMinChambre($minChambre)
    {
        $this->minChambre = $minChambre;

        return $this;
    }

    /**
     * Get the value of minCouchage
     */ 
    public function getMinCouchage(): ?int
    {
        return $this->minCouchage;
    }

    /**
     * Set the value of minCouchage
     *
     * @return  self
     */ 
    public function setMinCouchage($minCouchage)
    {
        $this->minCouchage = $minCouchage;

        return $this;
    }

    /**
     * Get the value of equipement
     *
     * @return  ArrayCollection
     */ 
    public function getEquipement()
    {
        return $this->equipement;
    }

    /**
     * Set the value of equipement
     *
     * @param  ArrayCollection  $equipement
     *
     * @return  self
     */ 
    public function setEquipement(ArrayCollection $equipement)
    {
        $this->equipement = $equipement;

        return $this;
    }

    /**
     * Get min=50,
     *
     * @return  float|null
     */ 
    public function getMaxTarif()
    {
        return $this->maxTarif;
    }

    /**
     * Set min=50,
     *
     * @param  float|null  $maxTarif  min=50,
     *
     * @return  self
     */ 
    public function setMaxTarif($maxTarif)
    {
        $this->maxTarif = $maxTarif;

        return $this;
    }

    /**
     * Get the value of region
     *
     * @return  ArrayCollection
     */ 
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set the value of region
     *
     * @param  ArrayCollection  $region
     *
     * @return  self
     */ 
    public function setRegion(ArrayCollection $region)
    {
        $this->region = $region;

        return $this;
    }
}