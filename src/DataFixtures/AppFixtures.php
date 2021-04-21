<?php

namespace App\DataFixtures;

use App\Entity\Book;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Node\Expr\Cast\Object_;
use PhpParser\Node\Expr\New_;

class AppFixtures extends Fixture{

    // $manager est un service injecté (injection de dépendance)
    public function load(ObjectManager $manager){

        $data = [
            [
                'titre' => 'Respire !',
                'cover' => "respire.jpg",
                'parution' => new DateTime('2020/01/09')
            ],
            [
                'titre' => 'Ton autre vie',
                'cover' => "ton_autre_vie.jpg",
                'parution' => new DateTime('2021/01/14')
            ],
            [
                'titre' => 'Féminité sacrée',
                'cover' => "feminite_sacree.jpg",
                'parution' => new DateTime('2020/06/04')
            ]
           
        ];

        foreach ($data as $b) {
            $book = new Book;
            $book 
                -> setTitle($b['title'])
                -> setCover($b['cover'])
                -> setParution($b['parution']);

            $manager->persist($book);
        }
        //a la fin
        $manager->flush();
    }
}
