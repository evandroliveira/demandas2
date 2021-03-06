<?php
namespace Application\Controller;

use Zend\Session\SessionManager;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $sessionManager = new SessionManager();
        $sessionManager->start();
        return new IndexController($container);
        
    }
}