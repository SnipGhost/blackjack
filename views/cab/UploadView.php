<div class="content-box">
	<?php

		function loadKitFile($file)
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

			echo "Некоторая отладочная информация:\n";
			print_r($file);

			// Добавим проверочку на ошибки подгрузки файла
			if ($file['error'] !== UPLOAD_ERR_OK) { 
				throw new UploadException($file['error']);
			}

			// Обратите внимение!
			// На директорию $uploaddir должны быть выданы права пользователю, от которого
			// запускается веб-сервер и php, для Apache-а это пользователь _www
			// Для этого можно сделать: sudo chown _www data/upload
			$uploaddir = ROOT . 'data/upload/';
			$types = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
			$maxFileSize = 255; // В байтах

			// TODO: Плохо, нужно вообще рандомное имя генерить и записывать в БД
			$uploadfile = $uploaddir . $user->id . '_' . md5(basename($file['name'])) . '.csv';

			// Проверка MIME-типов
			if (!in_array($file['type'], $types)) {
				throw new UploadException(UPLOAD_S_ERR_WRONG_TYPE);
			}

			// Проверка размеров файла (уже после загрузки!)
			// А проверка до - только через php.ini, переменные:
			// upload_max_filesize и post_max_size
			if ($file['size'] > $maxFileSize) {
				throw new UploadException(UPLOAD_S_ERR_WRONG_SIZE);
			}

			// TODO: Безопасная проверка содержимого файла (?)
			// Ошибка - UPLOAD_S_ERR_WRONG_CONTENT

			// В принципе, можно делать бизнес-логику прям сразу тут, не копируя файл
			echo "Имя файла после загрузки: $uploadfile\n";

			// Перемещение в постоянное хранилище
			if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
				throw new UploadException(UPLOAD_S_ERR_MOVE_FILE);
			}

			echo "Файл корректен и был успешно загружен.\n";
		}

		// Использование, стоит перенести все в контроллер
		echo "<pre>Загрузка файла ...\n";
		try {
			loadKitFile($_FILES['file']);
		} catch (UploadException $e) {
			echo 'Ошибка при загрузке файла: ', $e->getMessage();
		}
		echo '</pre>';

	?>
</div>