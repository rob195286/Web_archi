<?php

namespace App\DataFixtures;

use App\Entity\Critic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CriticFixture extends Fixture
{
    public const CRITIC_REFERENCE = 'criticArray';
    public function load(ObjectManager $manager)
    {/*
        $manager->flush();
        $this->addReference(self::CRITIC_REFERENCE, $criticArray);*/
    }
}
