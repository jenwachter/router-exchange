<?php

namespace RouterExchange;

class Router
{
	protected $adapter;

	public function __construct($adapter)
	{
		$this->adapter = $adapter;
	}

	public function get($pattern, $callback)
	{
		$this->adapter->get($pattern, $callback);
	}

	public function run()
	{
		$this->adapter->run();
	}
}