<?php

namespace App\Entity;

use App\Repository\BacALitiereRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BacALitiereRepository::class)]
class BacALitiere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $dimensions = null;

    #[ORM\Column(length: 50)]
    private ?string $matière = null;

    #[ORM\Column]
    private ?int $quantité_en_stock = null;

    #[ORM\Column(length: 25)]
    private ?string $couleur = null;

    #[ORM\Column(length: 13)]
    private ?string $code_barre = null;

    #[ORM\ManyToOne(inversedBy: 'bacALitieres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Marque $marque = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }

    public function setDimensions(?string $dimensions): static
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    public function getMatière(): ?string
    {
        return $this->matière;
    }

    public function setMatière(string $matière): static
    {
        $this->matière = $matière;
        return $this;
    }

    public function getQuantitéEnStock(): ?int
    {
        return $this->quantité_en_stock;
    }

    public function setQuantitéEnStock(int $quantité_en_stock): static
    {
        $this->quantité_en_stock = $quantité_en_stock;
        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;
        return $this;
    }

    public function getCodeBarre(): ?string
    {
        return $this->code_barre;
    }

    public function setCodeBarre(string $code_barre): static
    {
        $this->code_barre = $code_barre;
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
}
