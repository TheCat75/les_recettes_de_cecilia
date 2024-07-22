<?php

namespace App\Entity;

use App\Repository\NutritionalValuesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: NutritionalValuesRepository::class)]
class NutritionalValues
{

    use TimestampableEntity;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?float $energy = null;

    #[ORM\Column(nullable: true)]
    private ?float $carbohydrates = null;

    #[ORM\Column(nullable: true)]
    private ?float $sugars = null;

    #[ORM\Column(nullable: true)]
    private ?float $lipids = null;

    #[ORM\Column(nullable: true)]
    private ?float $proteins = null;

    #[ORM\Column(nullable: true)]
    private ?float $dietaryFibers = null;

    #[ORM\Column(nullable: true)]
    private ?float $fats = null;

    #[ORM\Column(nullable: true)]
    private ?float $salt = null;

    #[ORM\Column(nullable: true)]
    private ?float $saturatedFattyAcids = null;

    /**
     * @var Collection<int, Recipes>
     */
    #[ORM\OneToMany(targetEntity: Recipes::class, mappedBy: 'nutritionalValue')]
    private Collection $recipes;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnergy(): ?float
    {
        return $this->energy;
    }

    public function setEnergy(?float $energy): static
    {
        $this->energy = $energy;

        return $this;
    }

    public function getCarbohydrates(): ?float
    {
        return $this->carbohydrates;
    }

    public function setCarbohydrates(?float $carbohydrates): static
    {
        $this->carbohydrates = $carbohydrates;

        return $this;
    }

    public function getSugars(): ?float
    {
        return $this->sugars;
    }

    public function setSugars(?float $sugars): static
    {
        $this->sugars = $sugars;

        return $this;
    }

    public function getLipids(): ?float
    {
        return $this->lipids;
    }

    public function setLipids(?float $lipids): static
    {
        $this->lipids = $lipids;

        return $this;
    }

    public function getProteins(): ?float
    {
        return $this->proteins;
    }

    public function setProteins(?float $proteins): static
    {
        $this->proteins = $proteins;

        return $this;
    }

    public function getDietaryFibers(): ?float
    {
        return $this->dietaryFibers;
    }

    public function setDietaryFibers(?float $dietaryFibers): static
    {
        $this->dietaryFibers = $dietaryFibers;

        return $this;
    }

    public function getFats(): ?float
    {
        return $this->fats;
    }

    public function setFats(?float $fats): static
    {
        $this->fats = $fats;

        return $this;
    }

    public function getSalt(): ?float
    {
        return $this->salt;
    }

    public function setSalt(?float $salt): static
    {
        $this->salt = $salt;

        return $this;
    }

    public function getSaturatedFattyAcids(): ?float
    {
        return $this->saturatedFattyAcids;
    }

    public function setSaturatedFattyAcids(?float $saturatedFattyAcids): static
    {
        $this->saturatedFattyAcids = $saturatedFattyAcids;

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
            $recipe->setNutritionalValue($this);
        }

        return $this;
    }

    public function removeRecipe(Recipes $recipe): static
    {
        if ($this->recipes->removeElement($recipe)) {
            // set the owning side to null (unless already changed)
            if ($recipe->getNutritionalValue() === $this) {
                $recipe->setNutritionalValue(null);
            }
        }

        return $this;
    }
}