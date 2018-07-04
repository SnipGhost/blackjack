<div class="content-box">
	<?php
		echo "<pre>Загрузка файла ...\n";
		try {
			$filename = loadFile($_FILES['file'], 'data/upload/', 'csv', 10000000);
			echo "Имя файла после загрузки: $filename\n";
			echo "Файл корректен и был успешно загружен.\n";
		} catch (UploadException $e) {
			echo 'Ошибка при загрузке файла: ', $e->getMessage();
		}
		try{
			$data = handleFile($filename);
			$keys = array_keys($data);
			echo "Файл успешно обработан.\n";
			echo "Результат обработки: \n";
			for($i=0;$i<5;$i++){
				$a=$data[$keys[$i]];
				echo "$keys[$i]: $a\n";
			}
		}catch (UploadException $e)
		{
			echo 'Ошибка при обработке файла: ', $e->getMessage();	
		}
		echo '</pre>';
	?>
</div>