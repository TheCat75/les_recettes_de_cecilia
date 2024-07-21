<?php

namespace App\Entity;

use App\Repository\IngrediensRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\Timestampable;

#[ORM\Entity(repositoryClass: IngrediensRepository::class)]
class Ingrediens
{
    use Timestampable;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $quantities = null;

    /**
     * @var Collection<int, Receipes>
     */
    #[ORM\ManyToMany(targetEntity: Receipes::class, inversedBy: 'ingrediens')]
    private Collection $receipes;

    public function __construct()
    {
        $this->receipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantities(): ?int
    {
        return $this->quantities;
    }

    public function setQuantities(int $quantities): static
    {
        $this->quantities = $quantities;

        return $this;
    }

    /**
     * @return Collection<int, Receipes>
     */
    public function getReceipes(): Collection
    {
        return $this->receipes;
    }

    public function addReceipe(Receipes $receipe): static
    {
        if (!$this->receipes->contains($receipe)) {
            $this->receipes->add($receipe);
        }

        return $this;
    }

    public function removeReceipe(Receipes $receipe): static
    {
        $this->receipes->removeElement($receipe);

        return $this;
    }
}