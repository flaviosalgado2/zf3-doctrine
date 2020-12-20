<?php

namespace User;

use User\Controller\Factory\AuthControllerFactory;
use User\Controller\AuthController;
use User\Service\Factory\AuthenticationServiceFactory;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, ServiceProviderInterface, ControllerProviderInterface
{

    public function getConfig()
    {
        return include __DIR__ . "/../config/module.config.php";
    }

    public function getServiceConfig()
    {
        return [
            'aliases' => [
                AuthenticationService::class => AuthenticationServiceInterface::class
            ],
            'factories' => [
                AuthenticationServiceInterface::class => AuthenticationServiceFactory::class
            ]
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                AuthController::class => AuthControllerFactory::class
            ]
        ];
    }

}
