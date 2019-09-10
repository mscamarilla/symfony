<?php


namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ApplicationFixtures
 * @package App\DataFixtures
 */
class ApplicationFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        for ($c = 1; $c <= 5; $c++) {
            $category = new Category();
            $category->setName('category ' . $c);
            $manager->persist($category);

            for ($p = 1; $p <= 20; $p++) {
                $post = new Post();
                $post->setTitle('post ' . $p);
                $post->setText(mt_rand(10, 100));
                $post->setCategory($category);
                $manager->persist($post);
            }

            $manager->flush();
        }

    }
}
