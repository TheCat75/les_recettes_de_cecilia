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

    #[ORM\Column]
    private ?bool $cerealsContainingGluten = null;

    #[ORM\Column]
    private ?bool $crustaceans = null;

    #[ORM\Column]
    private ?bool $eggs = null;

    #[ORM\Column]
    private ?bool $fish = null;

    #[ORM\Column]
    private ?bool $milk = null;

    #[ORM\Column]
    private ?bool $soybeans = null;

    #[ORM\Column]
    private ?bool $peanuts = null;

    #[ORM\Column]
    private ?bool $nuts = null;

    #[ORM\Column]
    private ?bool $celery = null;

    #[ORM\Column]
    private ?bool $mustard = null;

    #[ORM\Column]
    private ?bool $sesameSeeds = null;

    #[ORM\Column]
    private ?bool $sulphurDioxideAndSulphites = null;

    /**
     * @var Collection<int, Recipes>
     */
    #[ORM\ManyToMany(targetEntity: Recipes::class, inversedBy: 'allergens')]
    private Collection $recipes;

    public function __construct()
    {
        $this->recipes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isCerealsContainingGluten(): ?bool
    {
        return $this->cerealsContainingGluten;
    }

    public function setCerealsContainingGluten(bool $cerealsContainingGluten): static
    {
        $this->cerealsContainingGluten = $cerealsContainingGluten;

        return $this;
    }

    public function isCrustaceans(): ?bool
    {
        return $this->crustaceans;
    }

    public function setCrustaceans(bool $crustaceans): static
    {
        $this->crustaceans = $crustaceans;

        return $this;
    }

    public function isEggs(): ?bool
    {
        return $this->eggs;
    }

    public function setEggs(bool $eggs): static
    {
        $this->eggs = $eggs;

        return $this;
    }

    public function isFish(): ?bool
    {
        return $this->fish;
    }

    public function setFish(bool $fish): static
    {
        $this->fish = $fish;

        return $this;
    }

    public function isMilk(): ?bool
    {
        return $this->milk;
    }

    public function setMilk(bool $milk): static
    {
        $this->milk = $milk;

        return $this;
    }

    public function isSoybeans(): ?bool
    {
        return $this->soybeans;
    }

    public function setSoybeans(bool $soybeans): static
    {
        $this->soybeans = $soybeans;

        return $this;
    }

    public function isPeanuts(): ?bool
    {
        return $this->peanuts;
    }

    public function setPeanuts(bool $peanuts): static
    {
        $this->peanuts = $peanuts;

        return $this;
    }

    public function isNuts(): ?bool
    {
        return $this->nuts;
    }

    public function setNuts(bool $nuts): static
    {
        $this->nuts = $nuts;

        return $this;
    }

    public function isCelery(): ?bool
    {
        return $this->celery;
    }

    public function setCelery(bool $celery): static
    {
        $this->celery = $celery;

        return $this;
    }

    public function isMustard(): ?bool
    {
        return $this->mustard;
    }

    public function setMustard(bool $mustard): static
    {
        $this->mustard = $mustard;

        return $this;
    }

    public function isSesameSeeds(): ?bool
    {
        return $this->sesameSeeds;
    }

    public function setSesameSeeds(bool $sesameSeeds): static
    {
        $this->sesameSeeds = $sesameSeeds;

        return $this;
    }

    public function isSulphurDioxideAndSulphites(): ?bool
    {
        return $this->sulphurDioxideAndSulphites;
    }

    public function setSulphurDioxideAndSulphites(bool $sulphurDioxideAndSulphites): static
    {
        $this->sulphurDioxideAndSulphites = $sulphurDioxideAndSulphites;

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
        }

        return $this;
    }

    public function removeRecipe(Recipes $recipe): static
    {
        $this->recipes->removeElement($recipe);

        return $this;
    }
}