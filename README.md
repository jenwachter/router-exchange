# Router Exchange

A collection of PHP interfaces and adapters to make swapping out router library dependencies quick and easy.

## Included adapters

1. [Slim Framework](http://slimframework.com/)
1. [Silex](http://silex.sensiolabs.org/)

Please feel free to fork the repo and create more adapters.

## Basic Usage

In this example, RouterExchange and Slim Framework have been preloaded via Composer.

1. Instantiate a new router adapter:
```php
$slim = new \Slim\Slim();
$router = new \RouterExchange\Adapters\Slim($slim);
```

2. Create some routes:
```php
$router->get("/:page", function ($page) {
	echo "You are on the {$page} page.";
});
```

2. Run the application:
```php
$router->run();
```

## Methods



### Settings

#### setDebug()
Enables or disables router debug mode.

##### Usage
```php
$router->setDebug($bool);
```

##### Parameters
1. __$bool__: (boolean) Required. TRUE to turn debug mode on; FALSE to turn it off. By default, debug mode is turned off.

##### Example
```php
$router->setDebug(true);
```




### HTTP

#### get(), post(), put(), delete(), options()
Maps a callback method to a matching URI requested by the given HTTP method.

##### Usage
```php
$router->get($pattern, $callback);
```

##### Parameters
1. __$pattern__: (string) Required. Route pattern to match. See documentation for specific adapter for details.
1. __$callback: (string) Required. Callable function that is executed when a route is matched. See documentation for specific adapter for details.

##### Example
```php
$router->get(":/page", function($page) {
	echo "This is the {$page} page."
});
```




### Route Methods

#### name()
Assigns a name to a route. Always chain to an HTTP method.

#### Usage
```php
$router->get($pattern, $callback)->name($name);
```

#### Parameters
1. __$name__: (string) Required. Name of the route.

##### Example
```php
$router->get(":/page", function($page) {
	echo "This is the {$page} page."
})->name("Page");
```



#### conditions()
Assigns regular expression conditions to route parameters. Always chain to an HTTP method.

#### Usage
```php
$router->get($pattern, $callback)->conditions(array($param, $regex));
```

#### Parameters
1. __$param__: (string) Required. Route parameter to assign the condition to.
1. __$regex__: (string) Required. Regular expression.

##### Example
```php
$router->get(":/page", function($page) {
	echo "This is the {$page} page."
})->conditions(array("page", "[a-z]+"));
```




### Middleware

#### before()
Assigns middleware(s) to run before the route callback. Multiple before middlewares can be assigned and will be executed in the order in which they were declared.

#### Usage
```php
$router->get($pattern, $callback)->before($callable);
```

#### Parameters
1. __$callable__: (function) Required. The function to run.

##### Example
```php
$router->get(":/page", function($page) {
	echo "This is the {$page} page."
})->before(function() {
	echo "This is the before middleware.";
});
```


#### after()
Assigns middleware(s) to run after the route callback. Multiple after middlewares can be assigned and will be executed in the order in which they were declared.

#### Usage
```php
$router->get($pattern, $callback)->after($callable);
```

#### Parameters
1. __$callable__: (function) Required. The function to run.

##### Example
```php
$router->get(":/page", function($page) {
	echo "This is the {$page} page."
})->after(function() {
	echo "This is the before middleware.";
});
```




### Router helpers


#### redirect()
Used within a route callable to redirect another page.

#### Usage
```php
$uri = "/hello";
$router->get("/", function($page) use ($router) {
	$router->redirect($uri);
});
```

#### Parameters
1. __$uri__: (string) URI to redirect a user to. The above example would redirect / to /hello.


#### abort()
Aborts the current request.

#### Usage
```php
$router->get("/secret/:page", function($page) use ($router) {
	$router->abort($code, $message);
});
```

#### Parameters
1. __$code__: (int) HTTP status code; for example, 404.
1. __$message__: (string) Error message to display to the user.




### Error

#### error()

#### Usage
```php
$router->error($callable);
```

#### Parameters
1. __$callable: (string) Required. Callable function that is executed when a route is matched. See documentation for specific adapter for details.


### Run

#### run()
Runs the application.

#### Usage
```php
$rotuer->run();
```