<?php

namespace Blog\Controller\Factory;

use Blog\Controller\BlogController;
use Blog\Entity\Post;
use Blog\Form\PostForm;
use Blog\Model\PostTable;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

class BlogControllerFactory
{

    public function __invoke(ContainerInterface $container)
    {

        // TODO: Implement __invoke() method.
        $entityManager = $container->get(EntityManager::class);
        $repository = $entityManager->getRepository(Post::class);
        $postForm = $container->get(PostForm::class);

        return new BlogController($entityManager, $repository, $postForm);
    }
}