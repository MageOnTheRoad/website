<?php

declare(strict_types=1);

namespace AppBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('config');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('base_url')->end()
            ->end();

        return $treeBuilder;
    }
}
