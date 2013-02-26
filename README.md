# Router Exchange

A collection of PHP interfaces and adapters to make swapping out router library dependencies quick and easy.

## Available adapters

1. [Slim Framework](http://slimframework.com/)
1. [Silex](http://silex.sensiolabs.org/)

Please feel free to form the repo and create more adapters.

## Basic Usage

In this example, RouterExchange and Slim Framework have been preloaded via Composer.

1. Instantiate a new router adapter:
```php
$slim = new \Slim\Slim();
$router = new \RouterExchange\Adapters\Slim($slim);
```

2. If you are on a development server, turn debug mode on:
```php
$router->setDebug(true);
```

3. Create some routes:
```php
$router->get("/:page", function ($page) {
	echo "You are on the {$page} page.";
});
```

4. Run the router:
```php
$router->run();
```

## Additional methods

Until I have time to write more detailed documentation, look in the router adapters for additional available methods. Enjoy!