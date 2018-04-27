<?php

class View
{	
	// Собирает результирующую страницу из шаблона
	public function display($templateFileName, $contentFileName, $data = null)
	{
		// [!] Внутри которого подключается контент
		include(ROOT."templates/$templateFileName");
	}
}