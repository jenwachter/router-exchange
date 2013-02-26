<?php

namespace RouterExchange\Adapters;

class Slim implements \RouterExchange\Interfaces\Router
{
	/**
	 * Slim object
	 * @var object
	 */
	protected $router;

	/**
	 * Route object created when a method (i.e. GET)
	 * method is called. This is the object all subesquent
	 * methods (like name()) must be called on.
	 * 
	 * @var object
	 */
	protected $route;

	public function __construct($slim)
	{
		$this->router = $slim;
	}

	public function setDebug($boolean)
	{
		$this->router->debug = (bool) $boolean;
		return $this;
	}

	public function get($pattern, $callable)
	{
		$this->route = $this->router->get($pattern, $callable);
		return $this;
	}

	public function post($pattern, $callable)
	{
		$this->route = $this->router->post($pattern, $callable);
		return $this;
	}

	public function put($pattern, $callable)
	{
		$this->route = $this->router->put($pattern, $callable);
		return $this;
	}
	
	public function delete($pattern, $callable)
	{
		$this->route = $this->router->delete($pattern, $callable);
		return $this;
	}
	
	public function options($pattern, $callable)
	{
		$this->route = $this->router->options($pattern, $callable);
		return $this;
	}

	public function name($name)
	{
		$this->route->name($name);
		return $this;
	}
	
	public function conditions($array)
	{
		$this->route->conditions($array);
		return $this;
	}

	public function redirect($url)
	{
		$this->router->redirect($url);
	}

	public function halt()
	{
		$this->router->halt();
	}
	
	public function pass()
	{
		$this->router->pass();
	}

	public function stop()
	{
		$this->router->stop();
	}

	public function error($callable)
	{
		$this->router->error($callable);
	}

	public function run()
	{
		$this->router->run();
	}
}