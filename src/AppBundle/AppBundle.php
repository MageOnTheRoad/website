<?php

declare(strict_types=1);

namespace AppBundle;

use AppBundle\DependencyInjection\AppExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    public function getContainerExtension(): AppExtension
    {
        return new AppExtension();
    }
}
