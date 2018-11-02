<?php

/*
 * This file is part of the HH2P liqpay package.
 *
 * (c) Oleksanr Sudak <sswebdis@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HH2P\Bundle\LiqpayBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class LiqpayExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yaml');
        if (class_exists(EntityManagerInterface::class)) {
            $loader->load('doctrine_orm.xml');
        }

    }

}