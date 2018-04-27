<?php

// Вывод отладочных данных - да/нет
define('DEBUG', true);
if (DEBUG) {
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
}

// Адрес, по которому мы должны получать index нашего сайта
define('BASE_URI', '~snipghost/blackjack/');

// Версия, для удобства написания
define('VERSION', 'v0.1');

// Файл с конфиденциальными настройками БД
include(ROOT.'etc/passwords.php');
// define(HOSTNAME, "");
// define(USERNAME, "");
// define(PASSWORD, "");
// define(DATABASE, "");
