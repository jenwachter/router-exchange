<?php

namespace RouterExchange\Adapters\Slim;

class Router implements \RouterExchange\Interfaces\Router
{
	/**
	 * Slim object
	 * @var object
	 */
	protected $router;

	/**
	 * Defined routes
	 * @var array
	 */
	protected $routes = array();

	public function __construct($options = array())
	{
		$this->router = new \Slim\Slim($options);
	}

	public function setDebug($boolean)
	{
		$this->router->config("debug", (bool) $boolean);
		return $this;
	}

	public function get($pattern, $callable)
	{
		$route = new Route($this->router, "get", $pattern, $callable);
		$this->routes[] = $route;
		return $route;
	}

	public function post($pattern, $callable)
	{
		$route = new Route($this->router, "post", $pattern, $callable);
		$this->routes[] = $route;
		return $route;
	}

	public function put($pattern, $callable)
	{
		$route = new Route($this->router, "post", $pattern, $callable);
		$this->routes[] = $route;
		return $route;
	}
	
	public function delete($pattern, $callable)
	{
		$route = new Route($this->router, "delete", $pattern, $callable);
		$this->routes[] = $route;
		return $route;
	}
	
	public function options($pattern, $callable)
	{
		$route = new Route($this->router, "options", $pattern, $callable);
		$this->routes[] = $route;
		return $route;
	}

	public function redirect($url)
	{
		$this->router->redirect($url);
	}

	public function abort($code, $message)
	{
		$this->router->abort($code, $message);
	}

	public function hook($name, $callable)
	{
		$this->router->hook($name, $callable);
	}

	public function error($callable)
	{
		$this->router->error($callable);
	}

	public function notFound($callable = null)
	{
		if ($callable) {
			$this->router->notFound($callable);
		} else {
			$this->router->notFound();
		}
		
	}

	public function run()
	{
		foreach ($this->routes as $route) {
			$route->setConditions();
			$route->setMiddleware();
		}

		$this->router->run();
	}
}