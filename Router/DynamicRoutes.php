<?php

namespace Router;

class DynamicRoutes
{
    private $allRoutes;

    private $dynamicPartOfRoute;

    public function __construct($allRoutes)
    {
        $this->allRoutes = $allRoutes;
    }

    public function findDynamicRouteForGivenRoute($routeForCheck)
    {
        $componentsOfRouteForCheck = explode('/', $routeForCheck);
        $baseUrlOfRouteForCheck = array_slice($componentsOfRouteForCheck, 0, count($componentsOfRouteForCheck) - 1);

        if (count($baseUrlOfRouteForCheck) > 1) {
            foreach (array_keys($this->allRoutes) as $route) {
                $componentsOfRoute = explode('/', $route);
                $baseUrlOfRoute = array_slice($componentsOfRoute, 0, count($componentsOfRoute) - 1);
                if ($baseUrlOfRoute === $baseUrlOfRouteForCheck) {
                    $this->dynamicPartOfRoute = end($componentsOfRouteForCheck);
                    return $route;
                }
            }
        }

        return null;
    }

    public function getDynamicPartOfRoute()
    {
        return $this->dynamicPartOfRoute;
    }
}
