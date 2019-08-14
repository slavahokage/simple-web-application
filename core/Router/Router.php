<?php

namespace Core\Router;

use DI\Container;

class Router
{
    private $request;

    private $container;

    private const CONTROLLER_DIRECTORY = 'App\Controller\\';

    private const SUPPORTED_HTTP_METHODS = [
        "GET",
        "POST"
    ];

    public function __construct(Request $request, Container $container)
    {
        $this->request = $request;
        $this->container = $container;
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
        $methodDictionary = $this->{strtolower($this->request->requestMethod)};
        $formatedRoute = $this->formatRoute($this->request->pathInfo);


        if (!array_key_exists($this->formatRoute($this->request->pathInfo), $methodDictionary)) {
            $this->defaultRequestHandler();
            return;
        }

        $method = $methodDictionary[$formatedRoute];

        if (is_callable($method)) {
            echo call_user_func_array($method, array($this->request));
            return;
        }

        $this->executeControllerAction($method);
    }

    private function executeControllerAction($method, $argumentsForAction = null)
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
