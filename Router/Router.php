<?php

namespace Router;

class Router
{
    private $request;

    private $controllerDirectory = 'App\Controller\\';

    private $supportedHttpMethods = array(
        "GET",
        "POST"
    );

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function __call($name, $args)
    {
        list($route, $method) = $args;
        if (!in_array(strtoupper($name), $this->supportedHttpMethods)) {
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

        $dynamicRoutes = new DynamicRoutes($methodDictionary);

        $formatedRoute = $dynamicRoutes->findDynamicRouteForGivenRoute($formatedRoute);

        $argumentsForAction = $dynamicRoutes->getDynamicPartOfRoute();

        if (is_null($formatedRoute)) {
            if (!array_key_exists($this->formatRoute($this->request->pathInfo), $methodDictionary)) {
                $this->defaultRequestHandler();
                return;
            } else {
                $formatedRoute = $this->formatRoute($this->request->pathInfo);
            }
        }

        $method = $methodDictionary[$formatedRoute];

        if (is_callable($method)) {
            echo call_user_func_array($method, array($this->request));
            return;
        }

        $this->executeControllerAction($method, $argumentsForAction);
    }

    private function executeControllerAction($method, $argumentsForAction = null)
    {
        list($controller, $action) = explode("@", $method);

        $controller = $this->controllerDirectory . $controller;
        $newControllerInstance = new $controller();

        echo $newControllerInstance->$action($argumentsForAction);
    }

    public function __destruct()
    {
        $this->resolve();
    }
}

