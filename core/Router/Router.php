<?php

namespace Core\Router;

use DI\Container;

class Router
{
    private $request;

    private $container;

    private $routeParser;

    private const CONTROLLER_DIRECTORY = 'App\Controller\\';

    private const SUPPORTED_HTTP_METHODS = [
        "GET",
        "POST"
    ];

    public function __construct(Request $request, Container $container, RouteParser $routeParser)
    {
        $this->request = $request;
        $this->container = $container;
        $this->routeParser = $routeParser;
    }

    public function __call($name, $args)
    {
        list($route, $method) = $args;
        if (!in_array(strtoupper($name), self::SUPPORTED_HTTP_METHODS)) {
            $this->invalidMethodHandler();
        }
        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }

    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '') {
            return '/';
        }
        return $result;
    }

    private function invalidMethodHandler()
    {
        header("{$this->request->serverProtocol} 405 Method Not Allowed");
    }

    private function defaultRequestHandler()
    {
        header("{$this->request->serverProtocol} 404 Not Found");
    }

    public function resolve()
    {
        $routes = $this->{strtolower($this->request->requestMethod)};
        $routeData = $this->routeParser->parse($routes);

        if (empty($routeData)) {
            $this->defaultRequestHandler();
        }

        $action = $routes[$routeData['appropriateRoute']];

        if (is_callable($action)) {
            echo call_user_func_array($action, array($this->request));
        } else {
            $arguments = $routeData['dynamicPartOfRoute'] ?? null;
            $this->executeControllerAction($action, $arguments);
        }
    }

    private function executeControllerAction($method, $argumentsForAction)
    {
        list($controller, $action) = explode("@", $method);

        $controller = self::CONTROLLER_DIRECTORY . $controller;

        echo $this->container->call([$controller, $action], [$argumentsForAction]);
    }

    public function __destruct()
    {
        $this->resolve();
    }
}

