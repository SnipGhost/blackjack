<?php

	// Закомментить/раскомментить DEBUG-код можно
	// применив regexp:   (\t*)(//)*(.+// DEBUG$)
	// закомментить:      $1//$3
	// раскомментить:     $1$3
	//-----------------------------------------------------
	// Если у вас нормальный regexp-интерпретатор, то
	// замените / на \/ в регулярном выражении (sublime)
	//-----------------------------------------------------

	// Проверяет и сохраняет указанный файл из POST-запроса
	// $file - массив с данынми файла из $_FILES
	// $dir  - директория, в которую необходимо загрузить
	// $ext  - предполагаемое расширение файла
	// $size - максимальный размер файла в байтах
	// Возвращает имя файла после сохранения (полный путь)
	function loadFile($file, $dir, $ext, $size)
	{
		// Если файл не приложен к форме
		if (!isset($file['name'])) {
			header('Location: ' . BASE_URI . 'cab#kit');
		}

		// Поверяем пользователя
		global $user;
		if (is_null($user)) {
			throw new UploadException(UPLOAD_S_ERR_AUTH);
		}

		//echo "Некоторая отладочная информация:\n"; // DEBUG
		//print_r($file);                            // DEBUG

		// Добавим проверочку на ошибки подгрузки файла
		if ($file['error'] !== UPLOAD_ERR_OK) { 
			throw new UploadException($file['error']);
		}

		// Обратите внимение!
		// На директорию $uploaddir должны быть выданы права пользователю, от которого
		// запускается веб-сервер и php, для Apache-а это пользователь _www
		// Для этого можно сделать: sudo chown _www data/upload
		$uploaddir = ROOT . $dir;

		switch ($ext) {
			case 'csv':
				$types = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
				break;
			default:
				$types = array('text/plain');
				break;
		}

		// TODO: Плохо, нужно вообще рандомное имя генерить и записывать в БД
		$uploadfile = $uploaddir . $user->id . '_' . md5(basename($file['name'])) . '.' . $ext;

		// Проверка MIME-типов
		if (!in_array($file['type'], $types)) {
			throw new UploadException(UPLOAD_S_ERR_WRONG_TYPE);
		}

		// Проверка размеров файла (уже после загрузки!)
		// А проверка до - только через php.ini, переменные:
		// upload_max_filesize и post_max_size
		if ($file['size'] > $size) {
			throw new UploadException(UPLOAD_S_ERR_WRONG_SIZE);
		}

		// TODO: Безопасная проверка содержимого файла (?)
		// Ошибка - UPLOAD_S_ERR_WRONG_CONTENT

		// В принципе, можно делать бизнес-логику прям сразу тут, не копируя файл
		//echo "Имя файла после загрузки: $uploadfile\n"; // DEBUG

		// Перемещение в постоянное хранилище
		if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
			throw new UploadException(UPLOAD_S_ERR_MOVE_FILE);
		}
		
		//echo "Файл корректен и был успешно загружен.\n"; // DEBUG
		return $uploadfile;
	}
