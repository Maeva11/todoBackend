<?php

namespace App\DataFixtures;

use App\Entity\Priority;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Todo;
use Faker;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $priorities = new Priority();
        $priority = $priorities->getName();

        var_dump($priorities); die;

        $faker = Faker\Factory::create('fr_FR');
        $todos = Array();
        for ($i = 0; $i < 50; $i++) {
            $todos[$i] = new Todo();
            $todos[$i]->setName($faker->name);
            $todos[$i]->setDescription($faker->text);
            $todos[$i]->setDone(true);
            $todos[$i]->setPriority($priority);

            $manager->persist($todos[$i]);
        }

        $manager->flush();
    }
}
