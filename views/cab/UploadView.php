<div class="content-box">
	<?php

		function loadKitFile()
		{
			global $user;
			
			if (is_null($user)) {
				echo "Неавторизированный пользователь\n";
				return 0;
			}

			// Обратите внимение!
			// На директорию $uploaddir должны быть выданы права пользователю, от которого
			// запускается веб-сервер и php, для Apache-а это пользователь _www
			// Для этого можно сделать: sudo chown _www data/upload
			$uploaddir = ROOT . 'data/upload/';
			$types = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
			$maxFileSize = 255; // В байтах

			// TODO: Плохо, нужно вообще рандомное имя генерить и записывать в БД
			$uploadfile = $uploaddir . $user->id . '_' . md5(basename($_FILES['file']['name']));

			echo "Некоторая отладочная информация:\n";
			print_r($_FILES);

			// Проверка MIME-типов
			if (!in_array($_FILES['file']['type'], $types)) {
				echo "Файл некорректного типа!\n";
				return 0;
			}

			// Проверка размеров файла (уже после загрузки!)
			// А проверка до - только через php.ini, переменные:
			// upload_max_filesize и post_max_size
			if ($_FILES['file']['size'] > $maxFileSize) {
				echo "Слишком большой файл!\n";
				return 0;
			}

			// TODO: Безопасная проверка содержимого файла (?)

			// В принципе, можно делать бизнес-логику прям сразу тут, не копируя файл
			echo "Имя файла после загрузки: $uploadfile\n";

			// Перемещение в постоянное хранилище
			if (!move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
				echo "Ошибка при перемещении файла!\n";
				return 0;
			}

			echo "Файл корректен и был успешно загружен.\n";
			return 1;
		}

		// Использование, стоит перенести все в контроллер
		echo "<pre>Загрузка файла ...\n";
		loadKitFile();
		echo '</pre>';

	?>
</div>