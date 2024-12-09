<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarqueRepository::class)]
class Marque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, BacALitiere>
     */
    #[ORM\OneToMany(targetEntity: BacALitiere::class, mappedBy: 'marque')]
    private Collection $bacALitieres;

    public function __construct()
    {
        $this->bacALitieres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

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

    /**
     * @return Collection<int, BacALitiere>
     */
    public function getBacALitieres(): Collection
    {
        return $this->bacALitieres;
    }

    public function addBacALitiere(BacALitiere $bacALitiere): static
    {
        if (!$this->bacALitieres->contains($bacALitiere)) {
            $this->bacALitieres->add($bacALitiere);
            $bacALitiere->setMarque($this);
        }

        return $this;
    }

    public function removeBacALitiere(BacALitiere $bacALitiere): static
    {
        if ($this->bacALitieres->removeElement($bacALitiere)) {
            // set the owning side to null (unless already changed)
            if ($bacALitiere->getMarque() === $this) {
                $bacALitiere->setMarque(null);
            }
        }

        return $this;
    }
}
