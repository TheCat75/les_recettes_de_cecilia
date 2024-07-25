<?php

namespace App\Entity;

use App\Repository\IngredientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: IngredientsRepository::class)]
class Ingredients
{

    use TimestampableEntity;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameIngredient = null;

    #[ORM\Column]
    private ?float $quantities = null;

    /**
     * @var Collection<int, Recipes>
     */
    #[ORM\ManyToMany(targetEntity: Recipes::class, mappedBy: 'ingrediens')]
    private Collection $recipes;

    #[ORM\Column(length: 255)]
    private ?string $units = null;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameIngredient(): ?string
    {
        return $this->nameIngredient;
    }

    public function setNameIngredient(string $nameIngredient): static
    {
        $this->nameIngredient = $nameIngredient;

        return $this;
    }

    public function getQuantities(): ?float
    {
        return $this->quantities;
    }

    public function setQuantities(float $quantities): static
    {
        $this->quantities = $quantities;

        return $this;
    }


    /**
     * @return Collection<int, Recipes>
     */
    public function getRecipes(): Collection
    {
        return $this->recipes;
    }

    public function addRecipe(Recipes $recipe): static
    {
        if (!$this->recipes->contains($recipe)) {
            $this->recipes->add($recipe);
            $recipe->addIngredien($this);
        }

        return $this;
    }

    public function removeRecipe(Recipes $recipe): static
    {
        if ($this->recipes->removeElement($recipe)) {
            $recipe->removeIngredien($this);
        }

        return $this;
    }

    public function getUnits(): ?string
    {
        return $this->units;
    }

    public function setUnits(string $units): static
    {
        $this->units = $units;

        return $this;
    }

    public function __toString() {
        
        return $this->nameIngredient; 
        
    }
}