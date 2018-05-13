<?php

// Вывод отладочных данных - да/нет
define('DEBUG', true);
if (DEBUG) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

// Файл с конфиденциальными и личными настройками
// Он в репозиторий НИКОГДА не коммитится (добавлен в .gitignore)
include ROOT.'etc/passwords.php';

// Настройки БД
if (!defined('HOSTNAME')) {
    define('HOSTNAME', 'localhost');
}
if (!defined('USERNAME')) {
    define('USERNAME', 'root');
}
if (!defined('PASSWORD')) {
    define('PASSWORD', '');
}
if (!defined('DATABASE')) {
    define('DATABASE', 'blackjack');
}

// Адрес, по которому мы должны получать index нашего сайта
// Например URL:    http://localhost/~snipghost/blackjack/
// Тогда BASE_URI:  ~snipghost/blackjack/
if (!defined('BASE_URI')) {
    define('BASE_URI', 'blackjack/');
}

// Версия, для удобства написания
if (!defined('VERSION')) {
    define('VERSION', 'v0.1');
}
