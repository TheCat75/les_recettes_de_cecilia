<?php

namespace App\Entity;

use App\Repository\RecipesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: RecipesRepository::class)]
class Recipes
{

    use TimestampableEntity;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Gedmo\Slug(fields: ['nameRecipe'], updatable: false)]
    private ?string $slug = null;
    
    #[ORM\Column(length: 255)]
    private ?string $nameRecipe = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $numberOfCovers = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $preparationTime = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $cookingTime = null;

    #[ORM\ManyToOne(inversedBy: 'recipes')]
    private ?NutritionalValues $nutritionalValue = null;

    /**
     * @var Collection<int, Steps>
     */
    #[ORM\OneToMany(targetEntity: Steps::class, mappedBy: 'recipes')]
    private Collection $steps;

    /**
     * @var Collection<int, Ingredients>
     */
    #[ORM\ManyToMany(targetEntity: Ingredients::class, inversedBy: 'recipes')]
    private Collection $ingrediens;

    /**
     * @var Collection<int, Allergens>
     */
    #[ORM\ManyToMany(targetEntity: Allergens::class, mappedBy: 'recipes')]
    private Collection $allergens;

    #[ORM\ManyToOne(inversedBy: 'recipes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function __construct()
    {
        $this->steps = new ArrayCollection();
        $this->ingrediens = new ArrayCollection();
        $this->allergens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameRecipe(): ?string
    {
        return $this->nameRecipe;
    }

    public function setNameRecipe(string $nameRecipe): static
    {
        $this->nameRecipe = $nameRecipe;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getNumberOfCovers(): ?int
    {
        return $this->numberOfCovers;
    }

    public function setNumberOfCovers(int $numberOfCovers): static
    {
        $this->numberOfCovers = $numberOfCovers;

        return $this;
    }

    public function getPreparationTime(): ?\DateTimeInterface
    {
        return $this->preparationTime;
    }

    public function setPreparationTime(\DateTimeInterface $preparationTime): static
    {
        $this->preparationTime = $preparationTime;

        return $this;
    }

    public function getCookingTime(): ?\DateTimeInterface
    {
        return $this->cookingTime;
    }

    public function setCookingTime(\DateTimeInterface $cookingTime): static
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    public function getNutritionalValue(): ?NutritionalValues
    {
        return $this->nutritionalValue;
    }

    public function setNutritionalValue(?NutritionalValues $nutritionalValue): static
    {
        $this->nutritionalValue = $nutritionalValue;

        return $this;
    }

    /**
     * @return Collection<int, Steps>
     */
    public function getSteps(): Collection
    {
        return $this->steps;
    }

    public function addStep(Steps $step): static
    {
        if (!$this->steps->contains($step)) {
            $this->steps->add($step);
            $step->setRecipes($this);
        }

        return $this;
    }

    public function removeStep(Steps $step): static
    {
        if ($this->steps->removeElement($step)) {
            // set the owning side to null (unless already changed)
            if ($step->getRecipes() === $this) {
                $step->setRecipes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ingredients>
     */
    public function getIngrediens(): Collection
    {
        return $this->ingrediens;
    }

    public function addIngredien(Ingredients $ingredien): static
    {
        if (!$this->ingrediens->contains($ingredien)) {
            $this->ingrediens->add($ingredien);
        }

        return $this;
    }

    public function removeIngredien(Ingredients $ingredien): static
    {
        $this->ingrediens->removeElement($ingredien);

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
            $allergen->addRecipe($this);
        }

        return $this;
    }

    public function removeAllergen(Allergens $allergen): static
    {
        if ($this->allergens->removeElement($allergen)) {
            $allergen->removeRecipe($this);
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function __toString(): string
    {
        return $this->nameRecipe;
    }
}