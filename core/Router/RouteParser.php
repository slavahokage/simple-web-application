<?php

namespace Core\Router;

class RouteParser
{
    private $routeData = [];

    public function parse($routes, $route)
    {
        if ($this->isRouteExists($routes, $route)) {
            $this->routeData['appropriateRoute'] = $route;
        } else {
            $this->findDynamicRoute($routes, $route);
        }

        return $this->routeData;
    }

    private function isRouteExists($routes, $route)
    {
        if (!array_key_exists($route, $routes)) {
            return false;
        }

        return true;
    }

    private function findDynamicRoute($routes, $route)
    {
        $componentsOfGivenRoute = explode('/', $route);
        $basePartOfGivenRoute = array_slice($componentsOfGivenRoute, 0, count($componentsOfGivenRoute) - 1);

        foreach (array_keys($routes) as $r) {
            $componentsOfRoute = explode('/', $r);
            $basePartOfRoute = array_slice($componentsOfRoute, 0, count($componentsOfRoute) - 1);
            if ($basePartOfRoute === $basePartOfGivenRoute) {
                $this->routeData['dynamicPartOfRoute'] = $componentsOfGivenRoute[count($componentsOfGivenRoute) - 1];
                $this->routeData['appropriateRoute'] = $r;
            }
        }
    }
}
