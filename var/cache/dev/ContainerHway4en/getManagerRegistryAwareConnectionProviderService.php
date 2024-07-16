<?php

namespace ContainerHway4en;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getManagerRegistryAwareConnectionProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Doctrine\Bundle\DoctrineBundle\Dbal\ManagerRegistryAwareConnectionProvider' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Dbal\ManagerRegistryAwareConnectionProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/dbal/src/Tools/Console/ConnectionProvider.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/doctrine-bundle/src/Dbal/ManagerRegistryAwareConnectionProvider.php';

        return $container->privates['Doctrine\\Bundle\\DoctrineBundle\\Dbal\\ManagerRegistryAwareConnectionProvider'] = new \Doctrine\Bundle\DoctrineBundle\Dbal\ManagerRegistryAwareConnectionProvider(new \Doctrine\Bundle\DoctrineBundle\Registry($container, $container->parameters['doctrine.connections'], $container->parameters['doctrine.entity_managers'], 'default', 'default'));
    }
}
