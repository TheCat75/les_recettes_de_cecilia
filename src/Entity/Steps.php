<?php

namespace App\Entity;

use App\Repository\StepsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\Timestampable;

#[ORM\Entity(repositoryClass: StepsRepository::class)]
class Steps
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numbers = null;

    #[ORM\ManyToOne(inversedBy: 'steps')]
    private ?Receipes $receipes = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumbers(): ?int
    {
        return $this->numbers;
    }

    public function setNumbers(int $numbers): static
    {
        $this->numbers = $numbers;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}