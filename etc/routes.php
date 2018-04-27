<?php

return array(

	// Страница по-умолчанию
	'' => ['MainController', 'actionIndex'],
	'home' => ['MainController', 'actionIndex'],

	// Страница муляж-тестер
	'test' => ['TestController', 'actionTest'],
	'test/[0-9]+' => ['TestController', 'actionTest'],

	// Страница, которая всегда пятисотит
	'500' => ['FAKE_CONTROLLER', 'actionFake'],

);