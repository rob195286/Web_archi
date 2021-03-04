<?php

namespace App\DataFixtures;

use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FilmFixture extends Fixture
{
    public const FILM_REFERENCE = 'filmArray';
    public function load(ObjectManager $manager)
    {/*
        
        $manager->flush();
        $this->addReference(self::FILM_REFERENCE, $filmArray);*/
    }
}
