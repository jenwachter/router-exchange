<?php

namespace RouterExchange\Adapters;

class Silex implements \RouterExchange\Interfaces\Router
{
	protected $silex;

	/**
	 * Controller object created when a method (i.e. GET)
	 * method is called. This is the object all subesquent
	 * methods (like name()) must be called on.
	 * 
	 * @var object
	 */
	protected $controller;

	public function __construct($silex)
	{
		$this->silex = $silex;
	}

	public function setDebug($boolean)
	{
		$this->silex["debug"] = (bool) $boolean;
		return $this;
	}

	public function get($pattern, $callback)
	{
		$this->controller = $this->silex->get($pattern, $callback);
		return $this;
	}

	public function post($pattern, $callback)
	{
		$this->controller = $this->silex->post($pattern, $callback);
		return $this;
	}

	public function put($pattern, $callback)
	{
		$this->controller = $this->silex->put($pattern, $callback);
		return $this;
	}
	
	public function delete($pattern, $callback)
	{
		$this->controller = $this->silex->delete($pattern, $callback);
		return $this;
	}
	
	public function options($pattern, $callback)
	{
		$this->controller = $this->silex->options($pattern, $callback);
		return $this;
	}

	public function name($name)
	{
		$this->controller->bind($name);
		return $this;
	}
	
	public function conditions($array)
	{
		foreach ($array as $arg => $pattern) {
			$this->controller->assert($arg, $pattern);
		}
		return $this;
	}

	public function redirect($url)
	{
		$this->silex->redirect($url);
	}

	public function halt()
	{
		$this->silex->halt();
	}
	
	public function pass()
	{
		$this->silex->pass();
	}

	public function stop()
	{
		$this->silex->stop();
	}

	public function error($callable)
	{
		$this->silex->error($callable);
	}

	public function run()
	{
		$this->silex->run();
	}
}