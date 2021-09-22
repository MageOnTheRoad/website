<?php

declare(strict_types=1);

namespace CmsBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use RuntimeException;

class DynamicRouting extends Loader
{
    private bool $isLoaded = false;

    public function load($resource, string $type = null)
    {
        if (true === $this->isLoaded) {
            throw new RuntimeException('Do not add the "extra" loader twice');
        }

        $routes = new RouteCollection();

        foreach ($this->routesList() as $key => $routeItem) {
            $defaults = [
                '_controller'  => 'CmsBundle\Controller\CmsController::dynamicView',
                'twigTemplate' => $routeItem . '.html.twig',
            ];

            $route = new Route($routeItem, $defaults, []);

            $routeName = 'cms_route_' . $key;
            $routes->add($routeName, $route);
        }

        $this->isLoaded = true;

        return $routes;
    }

    public function supports($resource, string $type = null)
    {
        return 'extra' === $type;
    }

    public function routesList() : array
    {
        return [
            'episode/000-introduction',
            'episode/001-your-contribution-is-important-to-the-magento-community',
        ];
    }
}
