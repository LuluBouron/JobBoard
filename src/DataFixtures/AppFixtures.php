<?php

namespace App\DataFixtures;

use App\Entity\Offre;
use App\Entity\Service;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private const TAGS = ['PHP', 'SYMFONY', 'LARAVEL', 'JS', 'REACT', 'VUE', 'ANGULAR', 'SQL', 'POSTGRESQL'];
    private const SERVICES = ['MARKETING', 'DESIGN', 'DEVELOPMENT', 'SALES', 'ACCOUNTING', 'HR'];
    
    public function load(ObjectManager $manager): void {

        $faker = Factory::create('fr_FR');

        foreach (self::TAGS as $tagName) { 
            $manager->persist($this->createTag($tagName));
        }
            
        foreach (self::SERVICES as $serviceName) {
                $manager->persist($this->createService($serviceName, $faker->phoneNumber(), $faker->email()));
            }
        
            $manager->flush();

        for ($i = 0; $i < 25; $i++) {       
            $offre = $this->createOffre(
                $faker->jobTitle(),    
                $faker->paragraph(3), 
                $faker->randomFloat(6, 0, 9999), 
                $this->randomService($manager), 
                $this->randomTags($manager)
            );
            $manager->persist($offre); }
            $manager->flush();
        }

    private function createService(string $nom, string $telephone, string $email): Service {

        $service = new Service(); 
        $service->setNom($nom); 
        $service->setTelephone($telephone); 
        $service->setEmail($email);
        return $service; 
    }

    private function createTag(string $nom): Tag {
        $tag = new Tag(); 
        $tag->setNom($nom);
        return $tag; 
    }

    private function createOffre(
            string $nom, 
            string $description, 
            float $salaire,
            Service $service,
            array $tags,
            ): Offre {
        
                $offre = new Offre(); 
                $offre
                    ->setNom($nom)
                    ->setDescription($description)
                    ->setSalaire($salaire)
                    ->setService($service)
                ;
                foreach ($tags as $tag) { $offre->addTag($tag);
                }

        return $offre; 
    }
    
    private function randomService(ObjectManager $manager): Service {
        return $manager->getRepository(Service::class)->findByNom(self::SERVICES[array_rand(self::SERVICES)])[0]; }

    private function randomTags(ObjectManager $manager): array {
         $tags = [];
        for ($j = 0; $j < 3; $j++) {
        $tags[] = $manager->getRepository(Tag::class)->findByNom(self::TAGS[array_rand(self::TAGS)])[0];
         }
            return $tags; }
}


