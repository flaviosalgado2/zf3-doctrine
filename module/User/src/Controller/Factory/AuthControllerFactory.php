<?php

namespace User\Controller\Factory;

use Interop\Container\ContainerInterface;
use User\Controller\AuthController;
use Zend\Authentication\AuthenticationServiceInterface;

class AuthControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        // TODO: Implement __invoke() method.
        $authService = $container->get(AuthenticationServiceInterface::class);
        return new AuthController($authService);
    }
}