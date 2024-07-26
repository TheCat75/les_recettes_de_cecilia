<?php

namespace App\Test\Controller;

use App\Entity\Recipes;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RecipesControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/recipes/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(Recipes::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Recipe index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'recipe[slug]' => 'Testing',
            'recipe[nameRecipe]' => 'Testing',
            'recipe[description]' => 'Testing',
            'recipe[numberOfCovers]' => 'Testing',
            'recipe[preparationTime]' => 'Testing',
            'recipe[cookingTime]' => 'Testing',
            'recipe[createdAt]' => 'Testing',
            'recipe[updatedAt]' => 'Testing',
            'recipe[ingrediens]' => 'Testing',
            'recipe[allergens]' => 'Testing',
            'recipe[user]' => 'Testing',
            'recipe[nutritionalValues]' => 'Testing',
        ]);

        self::assertResponseRedirects($this->path);

        self::assertSame(1, $this->repository->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Recipes();
        $fixture->setSlug('My Title');
        $fixture->setNameRecipe('My Title');
        $fixture->setDescription('My Title');
        $fixture->setNumberOfCovers('My Title');
        $fixture->setPreparationTime('My Title');
        $fixture->setCookingTime('My Title');
        $fixture->setCreatedAt('My Title');
        $fixture->setUpdatedAt('My Title');
        $fixture->setIngrediens('My Title');
        $fixture->setAllergens('My Title');
        $fixture->setUser('My Title');
        $fixture->setNutritionalValues('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Recipe');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Recipes();
        $fixture->setSlug('Value');
        $fixture->setNameRecipe('Value');
        $fixture->setDescription('Value');
        $fixture->setNumberOfCovers('Value');
        $fixture->setPreparationTime('Value');
        $fixture->setCookingTime('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');
        $fixture->setIngrediens('Value');
        $fixture->setAllergens('Value');
        $fixture->setUser('Value');
        $fixture->setNutritionalValues('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'recipe[slug]' => 'Something New',
            'recipe[nameRecipe]' => 'Something New',
            'recipe[description]' => 'Something New',
            'recipe[numberOfCovers]' => 'Something New',
            'recipe[preparationTime]' => 'Something New',
            'recipe[cookingTime]' => 'Something New',
            'recipe[createdAt]' => 'Something New',
            'recipe[updatedAt]' => 'Something New',
            'recipe[ingrediens]' => 'Something New',
            'recipe[allergens]' => 'Something New',
            'recipe[user]' => 'Something New',
            'recipe[nutritionalValues]' => 'Something New',
        ]);

        self::assertResponseRedirects('/recipes/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getSlug());
        self::assertSame('Something New', $fixture[0]->getNameRecipe());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getNumberOfCovers());
        self::assertSame('Something New', $fixture[0]->getPreparationTime());
        self::assertSame('Something New', $fixture[0]->getCookingTime());
        self::assertSame('Something New', $fixture[0]->getCreatedAt());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
        self::assertSame('Something New', $fixture[0]->getIngrediens());
        self::assertSame('Something New', $fixture[0]->getAllergens());
        self::assertSame('Something New', $fixture[0]->getUser());
        self::assertSame('Something New', $fixture[0]->getNutritionalValues());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new Recipes();
        $fixture->setSlug('Value');
        $fixture->setNameRecipe('Value');
        $fixture->setDescription('Value');
        $fixture->setNumberOfCovers('Value');
        $fixture->setPreparationTime('Value');
        $fixture->setCookingTime('Value');
        $fixture->setCreatedAt('Value');
        $fixture->setUpdatedAt('Value');
        $fixture->setIngrediens('Value');
        $fixture->setAllergens('Value');
        $fixture->setUser('Value');
        $fixture->setNutritionalValues('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/recipes/');
        self::assertSame(0, $this->repository->count([]));
    }
}
