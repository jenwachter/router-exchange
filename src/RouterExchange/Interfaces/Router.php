<?php

namespace RouterExchange\Interfaces;

interface Router
{
	public function get($pattern, $callback);
	public function run();
}