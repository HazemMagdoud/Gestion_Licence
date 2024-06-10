<?php

namespace ContainerA209vf5;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserProcessorService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Processor\UserProcessor' shared autowired service.
     *
     * @return \App\Processor\UserProcessor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'core'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'State'.\DIRECTORY_SEPARATOR.'ProcessorInterface.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Processor'.\DIRECTORY_SEPARATOR.'UserProcessor.php';

        $a = ($container->services['doctrine.orm.default_entity_manager'] ?? self::getDoctrine_Orm_DefaultEntityManagerService($container));

        if (isset($container->privates['App\\Processor\\UserProcessor'])) {
            return $container->privates['App\\Processor\\UserProcessor'];
        }

        return $container->privates['App\\Processor\\UserProcessor'] = new \App\Processor\UserProcessor(($container->services['request_stack'] ??= new \Symfony\Component\HttpFoundation\RequestStack()), $a);
    }
}
