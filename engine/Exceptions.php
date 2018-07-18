<?php

// Для того, чтобы различать откуда какой Exception прилетает -
//       - иерархично наследуемся от базового класса исключений

// Дополнительные константы для класса UploadException
define('UPLOAD_S_ERR_AUTH',          -1);
define('UPLOAD_S_ERR_WRONG_TYPE',    -2);
define('UPLOAD_S_ERR_WRONG_SIZE',    -3);
define('UPLOAD_S_ERR_WRONG_CONTENT', -4);
define('UPLOAD_S_ERR_MOVE_FILE',     -5);
define('FILE_NOT_FOUND', 		     -6);
define('HANDLE_ERR_OPEN',          -7);
define('HANDLE_ERR_STARTPARAMS',    -8);
define('HANDLE_ERR_LISTS',    -9);

class RoutingException extends Exception {}
class DataBaseException extends Exception {}
class SessionException extends Exception {}
class UploadException extends Exception
{
	public function __construct($code) {
		$message = $this->codeToMessage($code);
		parent::__construct($message, $code);
	}
	
	private function codeToMessage($code)
	{
		// TODO: Перепишите на русский потом, а?
		switch ($code) {
			case UPLOAD_ERR_INI_SIZE:
				$message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
				break;
			case UPLOAD_ERR_FORM_SIZE:
				$message = "Размер файла превысил максимальный размер загружаемого файла";
				break;
			case UPLOAD_ERR_PARTIAL:
				$message = "Файл был загружен лишь частично";
				break;
			case UPLOAD_ERR_NO_FILE:
				$message = "Файл не был выбран";
				break;
			case UPLOAD_ERR_NO_TMP_DIR:
				$message = "Missing a temporary folder";
				break;
			case UPLOAD_ERR_CANT_WRITE:
				$message = "Не удалось сохранить файл на диск";
				break;
			case UPLOAD_ERR_EXTENSION:
				$message = "File upload stopped by extension";
				break;
			case UPLOAD_S_ERR_WRONG_TYPE:
				$message = "Файл некорректного типа";
				break;
			case UPLOAD_S_ERR_WRONG_SIZE:
				$message = "Слишком большой файл";
				break;
			case UPLOAD_S_ERR_WRONG_CONTENT:
				$message = "Некорректное содержимое файла";
				break;
			case UPLOAD_S_ERR_MOVE_FILE:
				$message = "Ошибка при перемещении файла";
				break;
			case UPLOAD_S_ERR_AUTH:
				$message = "Неавторизированный пользователь";
				break;
			case FILE_NOT_FOUND:
				$message = "Ошибка сервера, файл не найден";
				break;
			default:
				$message = "Неизвестная ошибка загрузки файла";
				break;
		}
		return $message;
	}
} 
class HandleException extends Exception
{
	public function __construct($code) {
		$message = $this->codeToMessage($code);
		parent::__construct($message, $code);
	}

	private function codeToMessage($code)
	{
		// TODO: Перепишите на русский потом, а?
		switch ($code) {
			case HANDLE_ERR_OPEN:
				$message = "Не удалось обработать загружаемый файл. Не удалось прочитать загружаемый файл";
				break;
			case HANDLE_ERR_STARTPARAMS:
				$message = "Не удалось прочитать исходные данные. Проверьте их заполнение";
				break;
			case HANDLE_ERR_LISTS:
				$message = "Не удалось проочитать страницы дней. Проверьте заполнение данных листов";
				break;
			default:
				$message = "Неизвестная ошибка обработки файла";
				break;
		}
		return $message;
	}
} 