<?php

namespace App\Entity;

use App\Repository\ReceipesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ReceipesRepository::class)]
class Receipes
{
    use TimestampableEntity;    

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Allergens>
     */
    #[ORM\ManyToMany(targetEntity: Allergens::class, inversedBy: 'receipes', cascade: ['persist'])]
    private Collection $allergens;

    /**
     * @var Collection<int, Ingrediens>
     */
    #[ORM\ManyToMany(targetEntity: Ingrediens::class, mappedBy: 'receipes', cascade: ['persist'])]
    private Collection $ingrediens;

    /**
     * @var Collection<int, Steps>
     */
    #[ORM\OneToMany(targetEntity: Steps::class, mappedBy: 'receipes', cascade: ['persist'])]
    private Collection $steps;

    /**
     * @var Collection<int, NutritionalValues>
     */
    #[ORM\OneToMany(targetEntity: NutritionalValues::class, mappedBy: 'receipes', cascade: ['persist'])]
    private Collection $nutritionalValues;

    public function __construct()
    {
        $this->allergens = new ArrayCollection();
        $this->ingrediens = new ArrayCollection();
        $this->steps = new ArrayCollection();
        $this->nutritionalValues = new ArrayCollection();
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
     * @return Collection<int, Ingrediens>
     */
    public function getIngrediens(): Collection
    {
        return $this->ingrediens;
    }

    public function addIngredien(Ingrediens $ingredien): static
    {
        if (!$this->ingrediens->contains($ingredien)) {
            $this->ingrediens->add($ingredien);
            $ingredien->addReceipe($this);
        }

        return $this;
    }

    public function removeIngredien(Ingrediens $ingredien): static
    {
        if ($this->ingrediens->removeElement($ingredien)) {
            $ingredien->removeReceipe($this);
        }

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
            $step->setReceipes($this);
        }

        return $this;
    }

    public function removeStep(Steps $step): static
    {
        if ($this->steps->removeElement($step)) {
            // set the owning side to null (unless already changed)
            if ($step->getReceipes() === $this) {
                $step->setReceipes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, NutritionalValues>
     */
    public function getNutritionalValues(): Collection
    {
        return $this->nutritionalValues;
    }

    public function addNutritionalValue(NutritionalValues $nutritionalValue): static
    {
        if (!$this->nutritionalValues->contains($nutritionalValue)) {
            $this->nutritionalValues->add($nutritionalValue);
            $nutritionalValue->setReceipes($this);
        }

        return $this;
    }

    public function removeNutritionalValue(NutritionalValues $nutritionalValue): static
    {
        if ($this->nutritionalValues->removeElement($nutritionalValue)) {
            // set the owning side to null (unless already changed)
            if ($nutritionalValue->getReceipes() === $this) {
                $nutritionalValue->setReceipes(null);
            }
        }

        return $this;
    }
}