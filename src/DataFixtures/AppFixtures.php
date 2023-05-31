<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Todo;
use Faker;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $todos = Array();
        for ($i = 0; $i < 50; $i++) {
            $todos[$i] = new Todo();
            $todos[$i]->setName($faker->name);
            $todos[$i]->setDescription($faker->text);

            $manager->persist($todos[$i]);
        }

        $manager->flush();
    }
}
