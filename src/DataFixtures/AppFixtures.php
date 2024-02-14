<?php

namespace App\DataFixtures;

use App\Entity\Service;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private const TAGS = ['PHP', 'SYMFONY', 'LARAVEL', 'JS', 'REACT', 'VUE', 'ANGULAR', 'SQL', 'POSTGRESQL'];
    private const SERVICES = ['MARKETING', 'DESIGN', 'DEVELOPMENT', 'SALES', 'ACCOUNTING', 'HR'];

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    private function createService(string $nom, string $telephone, string $email): Service {
        $service = new Service(); $service->setNom($nom); $service->setTelephone($telephone); $service->setEmail($email);
        return $service; }

    private function createTag(string $nom): Tag {
        $tag = new Tag(); $tag->setNom($nom);
        return $tag; }

    
}


