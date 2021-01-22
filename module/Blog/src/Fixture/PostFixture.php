<?php

namespace Blog\Fixture;

use Blog\Entity\Post;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class PostFixture implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach (range(1, 20) as $value) {
            $post = new Post();
            $post->setTitle("Title $value");
            $post->setContent("<p>Content $value</p>");

            $manager->persist($post);
        }

        $manager->flush();
    }
}