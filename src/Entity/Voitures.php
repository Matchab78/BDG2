<?php

namespace App\Entity;

use App\Repository\VoituresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoituresRepository::class)]
class Voitures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $prixV;

    #[ORM\Column(type: 'integer')]
    private $stock;

    #[ORM\Column(type: 'text', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $vitesse;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $acceleration;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $annee;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $chevaux;

    #[ORM\Column(type: 'string', length: 255)]
    private $moteur;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $carburant;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $boiteAuto;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $conso;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $co2;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    private ?Marque $marque = null;

    #[ORM\ManyToOne(inversedBy: 'voitures')]
    private ?Couleur $couleur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $catVoitures = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixV(): ?int
    {
        return $this->prixV;
    }

    public function setPrixV(?int $prixV): self
    {
        $this->prixV = $prixV;
        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getVitesse(): ?int
    {
        return $this->vitesse;
    }

    public function setVitesse(?int $vitesse): self
    {
        $this->vitesse = $vitesse;
        return $this;
    }

    public function getAcceleration(): ?int
    {
        return $this->acceleration;
    }

    public function setAcceleration(?int $acceleration): self
    {
        $this->acceleration = $acceleration;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(?int $annee): self
    {
        $this->annee = $annee;
        return $this;
    }

    public function getChevaux(): ?string
    {
        return $this->chevaux;
    }

    public function setChevaux(?string $chevaux): self
    {
        $this->chevaux = $chevaux;
        return $this;
    }

    public function getMoteur(): ?string
    {
        return $this->moteur;
    }

    public function setMoteur(string $moteur): self
    {
        $this->moteur = $moteur;
        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(?string $carburant): self
    {
        $this->carburant = $carburant;
        return $this;
    }

    public function getBoiteAuto(): ?string
    {
        return $this->boiteAuto;
    }

    public function setBoiteAuto(?string $boiteAuto): self
    {
        $this->boiteAuto = $boiteAuto;
        return $this;
    }

    public function getConso(): ?string
    {
        return $this->conso;
    }

    public function setConso(?string $conso): self
    {
        $this->conso = $conso;
        return $this;
    }

    public function getCo2(): ?string
    {
        return $this->co2;
    }

    public function setCo2(?string $co2): self
    {
        $this->co2 = $co2;
        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getCouleur(): ?Couleur
    {
        return $this->couleur;
    }

    public function setCouleur(?Couleur $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getCatVoitures(): ?string
    {
        return $this->catVoitures;
    }

    public function setCatVoitures(?string $catVoitures): static
    {
        $this->catVoitures = $catVoitures;

        return $this;
    }
}
