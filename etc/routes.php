<?php

return array(

	// Страница по-умолчанию
	'' => ['MainController', 'actionIndex'],
	'tables' => ['MainController', 'actionTables'],

	// Страница муляж-тестер
	'test' => ['TestController', 'actionIndex'],

	// Страница, которая всегда пятисотит
	'500' => ['FAKE_CONTROLLER', 'actionFake'],

);