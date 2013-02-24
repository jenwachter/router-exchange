<?php

namespace RouterExchange\Interfaces;

interface Router
{
	public function setDebug($boolean);


	// HTTP methods
	public function get($pattern, $callback);
	public function post($pattern, $callback);
	public function put($pattern, $callback);
	public function delete($pattern, $callback);
	public function options($pattern, $callback);

	public function conditions($array);

	public function redirect($url);
	public function halt();
	public function pass();
	public function stop();

	public function run();
}