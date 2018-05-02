<?php

class Router
{

	// Маршруты в формате массива 'path' => ['controller', 'action']
	private $routes;

	// Подгружаем пути из отдельного файлика
	public function __construct()
	{
		$routesPath = ROOT.'etc/routes.php';
		$this->routes = include($routesPath);
	}

	// Возвращаем строку запроса без базовой части
	private function parseURI()
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
			$path = strtok($_SERVER['REQUEST_URI'], '?');
			return trim(str_replace(BASE_URI, '', $path), '/');
		}
	}

	// Запускаем маршрутизацию, внутри передаем управление подходящему контроллеру
	public function run()
	{
		$uri = $this->parseURI();

		if (array_key_exists($uri, $this->routes)) {

			$controllerName = $this->routes[$uri][0];
			$actionName = $this->routes[$uri][1];

			$controllerFile = ROOT . 'controllers/' . $controllerName. '.php';
			if (file_exists($controllerFile)) {
				include_once($controllerFile);
			} else {
				throw new RoutingException('No controller file: '.$controllerFile, 500);
			}

			try {
				$controllerObject = new $controllerName;
			} catch (Error $e) {
				throw new RoutingException('Class "'.$controllerName.'" not found', 500);
			}

			try {
				$result = $controllerObject->$actionName();
			} catch (Error $e) {
				throw new RoutingException('Action "'.$actionName.'" not found', 500);
			}

			echo $result;

		} else {
			// Если такого пути в списке нет - бросаем 404 исключение
			throw new RoutingException('No route: '.$uri, 404);
		}

	}
}