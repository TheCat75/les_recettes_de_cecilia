<?php

namespace App\Entity;

use App\Repository\NutritionalValuesRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\Timestampable;

#[ORM\Entity(repositoryClass: NutritionalValuesRepository::class)]
class NutritionalValues
{
    use Timestampable;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $percentages = null;

    #[ORM\ManyToOne(inversedBy: 'nutritionalValues')]
    private ?Receipes $receipes = null;

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

    public function getPercentages(): ?int
    {
        return $this->percentages;
    }

    public function setPercentages(int $percentages): static
    {
        $this->percentages = $percentages;

        return $this;
    }

    public function getReceipes(): ?Receipes
    {
        return $this->receipes;
    }

    public function setReceipes(?Receipes $receipes): static
    {
        $this->receipes = $receipes;

        return $this;
    }
}