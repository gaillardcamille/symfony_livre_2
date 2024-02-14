<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\ManyToMany(targetEntity: Livre::class, inversedBy: 'categories')]
    private Collection $Livres;

    public function __construct()
    {
        $this->Livres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * @return Collection<int, Livre>
     */
    public function getLivres(): Collection
    {
        return $this->Livres;
    }

    public function addLivre(Livre $livre): static
    {
        if (!$this->Livres->contains($livre)) {
            $this->Livres->add($livre);
        }

        return $this;
    }

    public function removeLivre(Livre $livre): static
    {
        $this->Livres->removeElement($livre);

        return $this;
    }
}
