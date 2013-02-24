<?php

namespace RouterExchange\Adapters;

class Slim implements \RouterExchange\Interfaces\Router
{
	protected $slim;

	public function __construct($slim)
	{
		$this->slim = $slim;
	}

	public function setDebug($boolean)
	{
		$this->slim->debug = (bool) $boolean;
	}

	public function get($pattern, $callback)
	{
		$this->slim->get($pattern, $callback);
		return $this;
	}

	public function post($pattern, $callback)
	{
		$this->slim->post($pattern, $callback);
		return $this;
	}

	public function put($pattern, $callback)
	{
		$this->slim->put($pattern, $callback);
		return $this;
	}
	
	public function delete($pattern, $callback)
	{
		$this->slim->delete($pattern, $callback);
		return $this;
	}
	
	public function options($pattern, $callback)
	{
		$this->slim->options($pattern, $callback);
		return $this;
	}
	
	public function conditions($array)
	{
		$this->slim->conditions($array);
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

	public function run()
	{
		$this->slim->run();
	}
}