<?php

// Для того, чтобы различать откуда какой Exception прилетает -
//       - иерархично наследуемся от базового класса исключений

// Дополнительные константы для класса UploadException
define('UPLOAD_S_ERR_AUTH',          -1);
define('UPLOAD_S_ERR_WRONG_TYPE',    -2);
define('UPLOAD_S_ERR_WRONG_SIZE',    -3);
define('UPLOAD_S_ERR_WRONG_CONTENT', -4);
define('UPLOAD_S_ERR_MOVE_FILE',     -5);

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
				$message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
				break;
			case UPLOAD_ERR_PARTIAL:
				$message = "The uploaded file was only partially uploaded";
				break;
			case UPLOAD_ERR_NO_FILE:
				$message = "No file was uploaded";
				break;
			case UPLOAD_ERR_NO_TMP_DIR:
				$message = "Missing a temporary folder";
				break;
			case UPLOAD_ERR_CANT_WRITE:
				$message = "Failed to write file to disk";
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
			default:
				$message = "Неизвестная ошибка загрузки файла";
				break;
		}
		return $message;
	}
} 