<?php

namespace RouterExchange\Interfaces;

interface Router
{
	// Settings
	public function setDebug($boolean);

	// HTTP methods
	public function get($pattern, $callback);
	public function post($pattern, $callback);
	public function put($pattern, $callback);
	public function delete($pattern, $callback);
	public function options($pattern, $callback);

	// Route methods
	public function name($name);
	public function conditions($array);

	// Router helpers
	public function redirect($url);
	public function halt();
	public function pass();
	public function stop();

	// Error reporting
	public function error($callable);

	// Run the router
	public function run();
}