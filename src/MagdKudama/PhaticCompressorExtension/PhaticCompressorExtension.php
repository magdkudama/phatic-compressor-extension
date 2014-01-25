<?php

namespace MagdKudama\PhaticCompressorExtension;

use MagdKudama\Phatic\Extension;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class PhaticCompressorExtension implements Extension
{
    public function load(array $config, ContainerBuilder $container)
    {
        $definition = new Definition('MagdKudama\PhaticCompressorExtension\PageCreationSubscriber');
        $definition->addTag('phatic.subscriber');
        $container->setDefinition('phatic.compressor.subscriber', $definition);
    }

    public function getConfig(ArrayNodeDefinition $builder)
    {
    }

    public function getExtensionDependency()
    {
        return 'MagdKudama\PhaticBlogExtension\PhaticBlogExtension';
    }
}