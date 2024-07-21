<?php

namespace App\Entity;

use App\Repository\AllergensRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: AllergensRepository::class)]
class Allergens
{
    use TimestampableEntity;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Receipes>
     */
    #[ORM\ManyToMany(targetEntity: Receipes::class, mappedBy: 'allergens')]
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
            $receipe->addAllergen($this);
        }

        return $this;
    }

    public function removeReceipe(Receipes $receipe): static
    {
        if ($this->receipes->removeElement($receipe)) {
            $receipe->removeAllergen($this);
        }

        return $this;
    }
}