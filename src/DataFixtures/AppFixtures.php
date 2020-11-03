<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Books;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): ObjectManager
    {
        $book_one = new Books();
        $book_two = new Books();
        $book_three = new Books();

        $book_one->setName("Бытие");
        $book_one->setAuthor("Аллах");
        $book_one->setYear(1999);
        $manager->persist($book_one);

        $book_two->setName("Как жизнь?");
        $book_two->setAuthor("Норм");
        $book_two->setYear(1999);
        $manager->persist($book_two);

        $book_three->setName("Быть или Быть?");
        $book_three->setAuthor("А?");
        $book_three->setYear(1999);
        $manager->persist($book_three);

        $manager->flush();
        return $manager;
    }
}
