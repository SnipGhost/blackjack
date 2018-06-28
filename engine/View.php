<?php

// Значения по-умолчанию:
define('DEFAULT_TEMPLATE_FILENAME', 'template.php'); // Файл шаблона
define('DEFAULT_CONTENT_FILENAME', '');              // Файл содержимого
define('DEFAULT_PAGE_TITLE', 'Главная');             // <title>...</title>

class View
{
    // Собирает результирующую страницу из шаблона
    public function display($page = null)
    {
        $this->verifyPageData($page);
        // Так из шаблона содержимое массива доступно по коротким именам
        // Например: $title, $content, ...
        extract($page);

        // [!] Внутри шаблона контент должен подключаться самостоятельно
        include ROOT."templates/$template";
    }

    // Заполняет пропущенные поля
    private function verifyPageData(&$arr)
    {
        if (!$arr) {
            $arr = array();
        }

        // Возможно, стоит усложнить, добавив проверки на наличие файлов
        if (!array_key_exists('title', $arr)) {
            $arr['title'] = DEFAULT_PAGE_TITLE;
        }

        if (!array_key_exists('template', $arr)) {
            $arr['template'] = DEFAULT_TEMPLATE_FILENAME;
        }

        // TODO: Убрать, когда жесткая установка одного контента устареет
        if (!array_key_exists('content', $arr)) {
            $arr['content'] = DEFAULT_CONTENT_FILENAME;
        }

        if (!array_key_exists('data', $arr)) {
            $arr['data'] = array();
        }
    }
}
