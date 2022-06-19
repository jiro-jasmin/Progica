<?php

namespace App\Entity;

use App\Repository\GiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GiteRepository::class)]
class Gite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotNull]
    /** @Assert\Length(
        *          min=3,
        *          max=50,
        *          minMessage = "Merci d'entrer un nom d'au moins {{ limit }} caractères!",
        *          maxMessage = "Merci d'entrer un nom de moins de {{ limit }} caractères!"
        * )
        */
    private string $nom;

    #[ORM\Column(type: 'text', length: 255)]
    #[Assert\NotNull]
    /** @Assert\Length(
        *          min=10,
        *          max=255,
        *          minMessage = "La description doit comporter au moins {{ limit }} caractères!",
        *          maxMessage = "La description doit comporter moins de {{ limit }} caractères!"
        * )
        */
    private string $description;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotNull]
    /** @Assert\Range(
     *      min = 30,
     *      max = 300,
     *      notInRangeMessage = "La surface doit être comprise entre {{ min }} et {{ max }}m².",
     * )
     */
    private int $surface;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotNull]
    private int $chambre;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotNull]
    private $couchage;

    #[ORM\ManyToMany(targetEntity: Equipement::class, inversedBy: 'gites')]
    private $equipements;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'gites')]
    private $proprietaire;

    #[ORM\Column(type: 'float')]
    private $tarifHebdo;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $adresse;

    #[ORM\ManyToOne(targetEntity: Region::class, inversedBy: 'gites')]
    #[ORM\JoinColumn(nullable: false)]
    private $region;

    public function __construct()
    {
        $this->equipements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getChambre(): ?int
    {
        return $this->chambre;
    }

    public function setChambre(int $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getCouchage(): ?int
    {
        return $this->couchage;
    }

    public function setCouchage(int $couchage): self
    {
        $this->couchage = $couchage;

        return $this;
    }

    /**
     * @return Collection<int, Equipement>
     */
    public function getEquipements(): Collection
    {
        return $this->equipements;
    }

    public function addEquipement(Equipement $equipement): self
    {
        if (!$this->equipements->contains($equipement)) {
            $this->equipements[] = $equipement;
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): self
    {
        $this->equipements->removeElement($equipement);

        return $this;
    }

    public function getProprietaire(): ?User
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?User $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getTarifHebdo(): ?float
    {
        return $this->tarifHebdo;
    }

    public function setTarifHebdo(float $tarifHebdo): self
    {
        $this->tarifHebdo = $tarifHebdo;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }
}