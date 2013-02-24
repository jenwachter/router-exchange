<?php

namespace RouterExchange\Adapters;

class Silex implements \RouterExchange\Interfaces\Router
{
	protected $silex;

	public function __construct($silex)
	{
		$this->silex = $silex;
	}

	public function setDebug($boolean)
	{
		$this->silex["debug"] = (bool) $boolean;
	}

	public function get($pattern, $callback)
	{
		$this->silex->get($pattern, $callback);
	}

	public function post($pattern, $callback)
	{
		$this->silex->post($pattern, $callback);
	}

	public function put($pattern, $callback)
	{
		$this->silex->put($pattern, $callback);
	}
	
	public function delete($pattern, $callback)
	{
		$this->silex->delete($pattern, $callback);
	}
	
	public function options($pattern, $callback)
	{
		$this->silex->options($pattern, $callback);
	}
	
	public function conditions($array)
	{
		$this->silex->conditions($array);
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

	public function run()
	{
		$this->silex->run();
	}
}