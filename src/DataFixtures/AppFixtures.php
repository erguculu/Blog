<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Post;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_FR');

        for($i=0; $i<10; $i++){
            $post = new Post();
            $post->setTitle($faker->sentence(2, true))
            ->setContent($faker->sentence(10, true))
            ->setAuthor($faker->name())
            ->setCreatedAt($faker->dateTimeBetween('-6 months'));

        $manager->persist($post);    
        }

        $manager->flush();
    }
}
