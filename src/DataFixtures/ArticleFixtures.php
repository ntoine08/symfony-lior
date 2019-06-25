<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Comment;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
                $faker = Faker\Factory::create('FR_fr');

                // Créer 3 catégories fakées
                for($i = 1; $i <=3; $i++){
                    $category = new Category();
                    $category->setTitle($faker->sentence())
                             ->setDescription($faker->paragraph());

                    $manager->persist($category);
                    }

                // crée entre 4 et 6 articles
                for($j = 1; $j <= mt_rand(4, 6); $j++)
                {
                    $article = new Article();
                    $article->setTitle($faker->sentence())
                            ->setContent($faker->paragraphs())
                            ->setImage("http://placehold.it/350x150")
                            ->setCreatedAt(new \DateTime());

                    $manager->persist($article);
                }
        $manager->flush();
    }
}
