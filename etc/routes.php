<?php

return array(

	// Страница по-умолчанию
	''       => ['MainController', 'actionIndex'],
	'tables' => ['MainController', 'actionTables'],

	// Страница муляж-тестер
	'test' => ['TestController', 'actionIndex'],

	// Страницы тестирования сокращений из DBConnection
	'db'            => ['DBController', 'actionIndex'],
	'db/insert'     => ['DBController', 'actionInsert'],
	'db/insertmany' => ['DBController', 'actionInsertMany'],
	'db/select'     => ['DBController', 'actionSelect'],
	'db/update'     => ['DBController', 'actionUpdate'],
	'db/delete'     => ['DBController', 'actionDelete'],
	'db/truncate'   => ['DBController', 'actionTruncate'],

	// Страница, которая всегда пятисотит
	'500' => ['FAKE_CONTROLLER', 'actionFake'],

);