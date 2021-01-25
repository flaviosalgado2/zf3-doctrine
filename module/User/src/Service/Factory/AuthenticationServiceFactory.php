<?php

namespace User\Service\Factory;

use Interop\Container\ContainerInterface;

//import session

class AuthenticationServiceFactory
{

    public function __invoke(ContainerInterface $container)
    {
        return $container->get('doctrine.authenticationservice.orm_default');
    }

}