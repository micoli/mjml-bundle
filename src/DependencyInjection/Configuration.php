<?php

namespace Assoconnect\MJMLBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('assoconnect_mjml');

        $rootNode
            ->children()
                ->arrayNode('template_paths')
                    ->beforeNormalization()
                        ->ifString()->then(function ($v) {
                            return [$v];
                        })
                        ->end()
                    ->prototype('scalar')->end()
                    ->defaultValue(['/templates/mjml'])
                ->end() // template_paths
            ->end();

        return $treeBuilder;
    }
}
