<?php

namespace ContainerA209vf5;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_Doctrine_Orm_State_ItemProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'api_platform.doctrine.orm.state.item_provider' shared service.
     *
     * @return \ApiPlatform\Doctrine\Orm\State\ItemProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'core'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'Common'.\DIRECTORY_SEPARATOR.'State'.\DIRECTORY_SEPARATOR.'LinksHandlerLocatorTrait.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'core'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'Common'.\DIRECTORY_SEPARATOR.'State'.\DIRECTORY_SEPARATOR.'LinksHandlerTrait.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'core'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'Orm'.\DIRECTORY_SEPARATOR.'State'.\DIRECTORY_SEPARATOR.'LinksHandlerTrait.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'api-platform'.\DIRECTORY_SEPARATOR.'core'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'Orm'.\DIRECTORY_SEPARATOR.'State'.\DIRECTORY_SEPARATOR.'ItemProvider.php';

        $a = ($container->privates['api_platform.metadata.resource.metadata_collection_factory.cached'] ?? self::getApiPlatform_Metadata_Resource_MetadataCollectionFactory_CachedService($container));

        if (isset($container->privates['api_platform.doctrine.orm.state.item_provider'])) {
            return $container->privates['api_platform.doctrine.orm.state.item_provider'];
        }

        return $container->privates['api_platform.doctrine.orm.state.item_provider'] = new \ApiPlatform\Doctrine\Orm\State\ItemProvider($a, ($container->services['doctrine'] ?? self::getDoctrineService($container)), new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['api_platform.doctrine.orm.query_extension.eager_loading'] ?? $container->load('getApiPlatform_Doctrine_Orm_QueryExtension_EagerLoadingService'));
            yield 1 => ($container->privates['api_platform.doctrine.orm.extension.parameter_extension'] ?? $container->load('getApiPlatform_Doctrine_Orm_Extension_ParameterExtensionService'));
        }, 2), ($container->privates['.service_locator.qssr6JI'] ?? $container->load('get_ServiceLocator_Qssr6JIService')));
    }
}
