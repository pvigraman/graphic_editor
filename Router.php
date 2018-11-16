<?php

/**
 * Class for Router
 */
class Router
{
	protected $routes=[
		'GET'=>[],
		'POST'=>[]
	];

	public function define($routes)
	{
		$this->routes=$routes;
	}

	public function get($uri,$controller)
	{
		$this->routes['GET'][$uri]=$controller;
	}

	public function post($uri,$controller)
	{
		$this->routes['POST'][$uri]=$controller;
	}

	public function direct($uri,$requestType)
	{
		
		$id=explode("/", $uri);
		if(isset($id[1]) && is_numeric($id[1]))
			$uri=$id[0];


		if(array_key_exists($uri, $this->routes[$requestType]))
		{
			$s=explode("@", $this->routes[$requestType][$uri]);
			$controller=$s[0];
			$action=$s[1];
			
			return $this->callAction($controller,$action);
		}

		throw new Exception("PAGE Not Found", 1);
		
	}

	public static function load($file)
	{
		$router=new static;

		require $file;

		return $router;	
	}

	protected function callAction($controller,$action)
	{
		if(!method_exists($controller,$action))
		{
			throw new Exception("Action ".$action."not found in the controller - ".$controller, 1);
			
		}

		return (new $controller)->$action();
	}
}