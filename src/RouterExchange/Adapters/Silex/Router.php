<?php

namespace RouterExchange\Adapters\Silex;

class Router implements \RouterExchange\Interfaces\Router
{
	/**
	 * Silex object
	 * @var object
	 */
	protected $router;

	/**
	 * Defined routes
	 * @var array
	 */
	protected $routes = array();

	protected $errorCallable;

	public function __construct($silex)
	{
		$this->router = $silex;
	}

	public function setDebug($boolean)
	{
		$this->router["debug"] = (bool) $boolean;
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

	public function error($callable = null)
	{
		if ($callable) {
			$this->router->error($callable);
		} else {
			$this->router->error($errorCallable);
		}
		
	}

	public function notFound($callable)
	{
		$this->router->error($callable);
	}

	public function run()
	{
		$this->router->run();
	}
}