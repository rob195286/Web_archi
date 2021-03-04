<?php

namespace App\DataFixtures;

use App\Entity\Note;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NoteFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {/*        
        $manager->flush();*/
    }
}
