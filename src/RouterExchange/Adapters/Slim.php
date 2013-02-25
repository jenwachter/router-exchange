<?php

namespace RouterExchange\Adapters;

class Slim implements \RouterExchange\Interfaces\Router
{
	protected $slim;

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
		$this->slim = $slim;
	}

	public function setDebug($boolean)
	{
		$this->slim->debug = (bool) $boolean;
		return $this;
	}

	public function get($pattern, $callback)
	{
		$this->route = $this->slim->get($pattern, $callback);
		return $this;
	}

	public function post($pattern, $callback)
	{
		$this->route = $this->slim->post($pattern, $callback);
		return $this;
	}

	public function put($pattern, $callback)
	{
		$this->route = $this->slim->put($pattern, $callback);
		return $this;
	}
	
	public function delete($pattern, $callback)
	{
		$this->route = $this->slim->delete($pattern, $callback);
		return $this;
	}
	
	public function options($pattern, $callback)
	{
		$this->route = $this->slim->options($pattern, $callback);
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
		$this->slim->redirect($url);
	}

	public function halt()
	{
		$this->slim->halt();
	}
	
	public function pass()
	{
		$this->slim->pass();
	}

	public function stop()
	{
		$this->slim->stop();
	}

	public function error($callable)
	{
		$this->slim->error($callable);
	}

	public function run()
	{
		$this->slim->run();
	}
}