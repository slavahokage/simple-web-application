<?php

namespace Core\Router;

class RouteParser
{
    private $routes;

    private $request;

    private $routeData = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function parse($routes)
    {
        $this->routes = $routes;

        $route = $this->formatRoute($this->request->pathInfo);

        if ($this->isRouteExists($route)) {
            $this->routeData['appropriateRoute'] = $route;
        } else {
            $this->findDynamicRoute($route);
        }

        return $this->routeData;
    }

    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '') {
            return '/';
        }
        return $result;
    }

    private function isRouteExists($route)
    {
        if (!array_key_exists($route, $this->routes)) {
            return false;
        }

        return true;
    }

    private function findDynamicRoute($route)
    {
        $componentsOfGivenRoute = explode('/', $route);
        $basePartOfGivenRoute = array_slice($componentsOfGivenRoute, 0, count($componentsOfGivenRoute) - 1);

        foreach (array_keys($this->routes) as $r) {
            $componentsOfRoute = explode('/', $r);
            $basePartOfRoute = array_slice($componentsOfRoute, 0, count($componentsOfRoute) - 1);
            if ($basePartOfRoute === $basePartOfGivenRoute) {
                $this->routeData['dynamicPartOfRoute'] = $componentsOfGivenRoute[count($componentsOfGivenRoute)-1];
                $this->routeData['appropriateRoute'] = $r;
            }
        }
    }
}
