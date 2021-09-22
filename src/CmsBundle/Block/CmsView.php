<?php

declare(strict_types=1);

namespace CmsBundle\Block;

use Symfony\Component\DependencyInjection\ContainerInterface;

class CmsView
{
    private ContainerInterface $container;

    public function __construct(
        ContainerInterface $container
    ) {
        $this->container = $container;
    }

    public function getBaseUrl(): string
    {
        return $this->container->getParameter('config.base_url');
    }

    public function getUrl(string $string): string
    {
        return $this->container->getParameter('config.base_url') . $string;
    }
}
