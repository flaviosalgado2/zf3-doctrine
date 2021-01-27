<?php

namespace Blog;

use Blog\Controller\BlogController;
use Blog\Controller\Factory\BlogControllerFactory;
use Blog\Controller\Factory\PostControllerFactory;
use Blog\Controller\PostController;
use Blog\Form\CommentForm;
use Blog\Form\Factory\CommentFormFactory;
use Blog\Form\Factory\PostFormFactory;
use Blog\Form\PostForm;
use Blog\Model\Factory\CommentTableFactory;
use Blog\Model\Factory\CommentTableGatewayFactory;
use User\Controller\AuthController;
use Zend\Authentication\AuthenticationServiceInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements ConfigProviderInterface, ServiceProviderInterface, ControllerProviderInterface
{

    //ZEND onBootstrap: este metodo sempre e chamado quando o modulo e motado
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $container = $e->getApplication()->getServiceManager();
        $eventManager->attach(MvcEvent::EVENT_DISPATCH,
            function (MvcEvent $e) use ($container) {
                $match = $e->getRouteMatch();

                $authService = $container->get(AuthenticationServiceInterface::class);
                $routeName = $match->getMatchedRouteName();
                if ($authService->hasIdentity()) {
                    return;
                } elseif (strpos($routeName, 'admin') !== false) {
                    $match->setParam('controller', AuthController::class)
                        ->setParam('action', 'login');
                }
            }, 100);
    }

    public function getConfig()
    {
        return include __DIR__ . "/../config/module.config.php";
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                PostForm::class => PostFormFactory::class,
                CommentForm::class => CommentFormFactory::class
            ]
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                BlogController::class => BlogControllerFactory::class,
                PostController::class => PostControllerFactory::class
            ]
        ];
    }

}
