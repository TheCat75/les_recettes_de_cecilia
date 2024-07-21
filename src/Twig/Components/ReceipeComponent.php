<?php

namespace App\Twig\Components;


use App\Entity\Receipes;
use App\Form\ReceipeFormType;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\LiveProp;

use Symfony\UX\LiveComponent\LiveCollectionTrait;

#[AsLiveComponent]
class ReceipeComponent extends AbstractController
{
    use DefaultActionTrait;
    use LiveCollectionTrait;

    #[LiveProp(fieldName: 'formData')]
    public ?Receipes $receipes;

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(
            ReceipeFormType::class,
            $this->receipes
        );
    }
}