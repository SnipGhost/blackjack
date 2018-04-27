<?php
//-----------------------------------------------------------------------------
// Front Controller
//-----------------------------------------------------------------------------

// Для отладки выставить DEBUG = true в etc/config.php

// Для удобства написания, стандартная практика
define('ROOT', dirname(__FILE__)."/");
require_once(ROOT.'etc/config.php');
require_once(ROOT.'engine/Model.php');
require_once(ROOT.'engine/View.php');
require_once(ROOT.'engine/Controller.php');
require_once(ROOT.'engine/Router.php');
require_once(ROOT.'engine/Exceptions.php');
require_once(ROOT.'engine/DBConnection.php');

// TODO: запуск сессии

// Подключение к базе данных
try {
	$db = new DBConnection(HOSTNAME, USERNAME, PASSWORD, DATABASE);
} catch (DataBaseException $e) {
	include(ROOT.'etc/error.php');
	exit();
}

// Маршрутизируем на подходящий контроллер
$router = new Router();
try {
	$router->run();
} catch (RoutingException $e) {
	include(ROOT.'etc/error.php');
}

// Закрытие соединения
$db->close();