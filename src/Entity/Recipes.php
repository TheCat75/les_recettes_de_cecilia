<?php

namespace App\Entity;

use App\Repository\RecipesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipesRepository::class)]
class Recipes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Ingredients>
     */
    #[ORM\ManyToMany(targetEntity: Ingredients::class, inversedBy: 'Recipe')]
    private Collection $Ingredients;

    /**
     * @var Collection<int, Preparation>
     */
    #[ORM\OneToMany(targetEntity: Preparation::class, mappedBy: 'recipe')]
    private Collection $preparation;

    /**
     * @var Collection<int, Allergens>
     */
    #[ORM\ManyToMany(targetEntity: Allergens::class, inversedBy: 'Recipe')]
    private Collection $allergens;

    /**
     * @var Collection<int, NutritionalValue>
     */
    #[ORM\ManyToMany(targetEntity: NutritionalValue::class, inversedBy: 'recipes')]
    private Collection $NutritionalValue;

    public function __construct()
    {
        $this->Ingredients = new ArrayCollection();
        $this->Nutritionalvalues = new ArrayCollection();
        $this->allergens = new ArrayCollection();
        $this->preparation = new ArrayCollection();
        $this->NutritionalValue = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Ingredients>
     */
    public function getIngredients(): Collection
    {
        return $this->Ingredients;
    }

    public function addIngredient(Ingredients $ingredient): static
    {
        if (!$this->Ingredients->contains($ingredient)) {
            $this->Ingredients->add($ingredient);
        }

        return $this;
    }

    public function removeIngredient(Ingredients $ingredient): static
    {
        $this->Ingredients->removeElement($ingredient);

        return $this;
    }

   

   

    /**
     * @return Collection<int, Preparation>
     */
    public function getPreparation(): Collection
    {
        return $this->preparation;
    }

    public function addPreparation(Preparation $preparation): static
    {
        if (!$this->preparation->contains($preparation)) {
            $this->preparation->add($preparation);
            $preparation->setRecipe($this);
        }

        return $this;
    }

    public function removePreparation(Preparation $preparation): static
    {
        if ($this->preparation->removeElement($preparation)) {
            // set the owning side to null (unless already changed)
            if ($preparation->getRecipe() === $this) {
                $preparation->setRecipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Allergens>
     */
    public function getAllergens(): Collection
    {
        return $this->allergens;
    }

    public function addAllergen(Allergens $allergen): static
    {
        if (!$this->allergens->contains($allergen)) {
            $this->allergens->add($allergen);
        }

        return $this;
    }

    public function removeAllergen(Allergens $allergen): static
    {
        $this->allergens->removeElement($allergen);

        return $this;
    }

    /**
     * @return Collection<int, NutritionalValue>
     */
    public function getNutritionalValue(): Collection
    {
        return $this->NutritionalValue;
    }

    public function addNutritionalValue(NutritionalValue $nutritionalValue): static
    {
        if (!$this->NutritionalValue->contains($nutritionalValue)) {
            $this->NutritionalValue->add($nutritionalValue);
        }

        return $this;
    }

    public function removeNutritionalValue(NutritionalValue $nutritionalValue): static
    {
        $this->NutritionalValue->removeElement($nutritionalValue);

        return $this;
    }
}