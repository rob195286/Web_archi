<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixture extends Fixture
{
    public const BOOK_REFERENCE = 'book-Array';
    public function load(ObjectManager $manager)
    {
       // $manager->flush();
        //$this->addReference(self::BOOK_REFERENCE, $bookArray);
    }
}
