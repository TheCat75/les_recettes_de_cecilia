<?php

namespace ContainerAiptpfY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_DoctrineMigrations_VersionsCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.doctrine_migrations.versions_command.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.doctrine_migrations.versions_command.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('doctrine:migrations:list', [], 'Display a list of all available migrations and their status.', false, #[\Closure(name: 'doctrine_migrations.versions_command', class: 'Doctrine\\Migrations\\Tools\\Console\\Command\\ListCommand')] fn (): \Doctrine\Migrations\Tools\Console\Command\ListCommand => ($container->privates['doctrine_migrations.versions_command'] ?? $container->load('getDoctrineMigrations_VersionsCommandService')));
    }
}
