<?php

namespace App\Twig\Components;

use App\Entity\Receipes;
use App\Form\ReceipesType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\LiveCollectionTrait;

#[AsLiveComponent]
final class Reciepes extends AbstractController
{
    use DefaultActionTrait;
    use LiveCollectionTrait;

    #[LiveProp]
    public ?Receipes $receipes;

    public function __construct()
    {
        $this->receipes = new Receipes();
    }
    

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(
            ReceipesType::class,
            $this->receipes
        );
    }
}