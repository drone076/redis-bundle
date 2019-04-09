<?php

namespace SymfonyBundles\RedisBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder('sb_redis');
        if (\method_exists($builder, 'getRootNode')) {
            $rootNode = $builder->getRootNode();
        } else {
            // BC layer for symfony/config 4.1 and older
            $rootNode = $treeBuilder->root('sb_redis');
        }

        $rootNode
            ->children()
                ->arrayNode('clients')
                    ->addDefaultChildrenIfNoneSet('default')
                    ->useAttributeAsKey('default')
                    ->prototype('array')
                        ->children()
                            ->arrayNode('$parameters')->prototype('variable')->end()->end()
                            ->arrayNode('$options')->prototype('variable')->end()->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $builder;
    }
}
