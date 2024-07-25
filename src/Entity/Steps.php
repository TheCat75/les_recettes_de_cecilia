<?php

namespace App\Entity;

use App\Repository\StepsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: StepsRepository::class)]
class Steps
{

    use TimestampableEntity;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptionStep = null;

    #[ORM\Column]
    private ?int $orderStep = null;

    #[ORM\ManyToOne(inversedBy: 'steps')]
    private ?Recipes $recipes = null;

    #[ORM\Column(length: 255)]
    private ?string $stepName = null;


    public function __toString()
    {
        return $this->stepName;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionStep(): ?string
    {
        return $this->descriptionStep;
    }

    public function setDescriptionStep(string $descriptionStep): static
    {
        $this->descriptionStep = $descriptionStep;

        return $this;
    }

    public function getOrderStep(): ?int
    {
        return $this->orderStep;
    }

    public function setOrderStep(int $orderStep): static
    {
        $this->orderStep = $orderStep;

        return $this;
    }

    public function getRecipes(): ?Recipes
    {
        return $this->recipes;
    }

    public function setRecipes(?Recipes $recipes): static
    {
        $this->recipes = $recipes;

        return $this;
    }

    public function getStepName(): ?string
    {
        return $this->stepName;
    }

    public function setStepName(string $stepName): static
    {
        $this->stepName = $stepName;

        return $this;
    }
}