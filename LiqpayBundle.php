<?php

/*
 * This file is part of the HH2P liqpay package.
 *
 * (c) Oleksanr Sudak <sswebdis@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HH2P\Bundle\LiqpayBundle;

use HH2P\Bundle\LiqpayBundle\DependencyInjection\LiqpayExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @author Oleksanr Sudak <sswebdis@gmail.com>
 */
class LiqpayBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

    }

    public function getContainerExtension()
    {
        return new LiqpayExtension();
    }
}
