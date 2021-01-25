<?php

namespace Blog\Fixture;

use Blog\Entity\Comment;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach (range(1, 40) as $value) {
            $post = $this->getReference("post-" . rand(1, 20));
            $comment = new Comment();
            $comment->setContent("<p>Content Comment $value</p>");
            $comment->setPost($post);

            $manager->persist($comment);

        }

        $manager->flush();
    }

    public function getOrder()
    {
        // TODO: Implement getOrder() method.
        return 20;
    }
}