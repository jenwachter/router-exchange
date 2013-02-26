<?php

namespace RouterExchange\Interfaces;

interface Router
{
	// Settings
	public function setDebug($boolean);

	// HTTP methods
	public function get($pattern, $callable);
	public function post($pattern, $callable);
	public function put($pattern, $callable);
	public function delete($pattern, $callable);
	public function options($pattern, $callable);

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