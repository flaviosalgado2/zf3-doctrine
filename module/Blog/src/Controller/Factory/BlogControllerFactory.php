<?php

namespace Blog\Controller\Factory;

use Blog\Controller\BlogController;
use Blog\Form\PostForm;
use Blog\Model\PostTable;
use Interop\Container\ContainerInterface;

class BlogControllerFactory
{

    public function __invoke(ContainerInterface $container)
    {
        // TODO: Implement __invoke() method.
        $postTable = $container->get(PostTable::class);
        $postForm = $container->get(PostForm::class);

        return new BlogController($postTable, $postForm);
    }
}