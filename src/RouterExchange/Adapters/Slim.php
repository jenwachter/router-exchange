<?php

namespace RouterExchange\Adapters;

class Slim implements \RouterExchange\Interfaces\Router
{
	protected $slim;

	public function __construct($slim)
	{
		$this->slim = $slim;
	}

	public function get($pattern, $callback)
	{
		$this->slim->get($pattern, $callback);
	}

	public function run()
	{
		$this->slim->run();
	}
}