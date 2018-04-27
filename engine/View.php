<?php

class View
{	
	// Собирает результирующую страницу из шаблона
	public function display($templateFileName, $contentFileName, $data = null, $meta = null)
	{
		if (!$meta) {
			$meta = array('title' => 'Главная');
		}
		// [!] Внутри шаблона контент должен подключаеться самостоятельно
		include(ROOT."templates/$templateFileName");
	}
}