<?php

namespace Blog\Model\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Blog\Model;
use Blog\Model\CommentTable;

class CommentTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // TODO: Implement __invoke() method.
        $tableGateway = $container->get(Model\CommentTableGateway::class);
        return new CommentTable($tableGateway);
    }
}