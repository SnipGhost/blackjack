<div class="content-box">
	<?php

		echo "<pre>Загрузка файла ...\n";
		try {
			$filename = loadFile($_FILES['file'], 'data/upload/', 'csv', 255);
			echo "Имя файла после загрузки: $filename\n";
			echo "Файл корректен и был успешно загружен.\n";
		} catch (UploadException $e) {
			echo 'Ошибка при загрузке файла: ', $e->getMessage();
		}
		echo '</pre>';

	?>
</div>