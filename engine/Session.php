<?php

// Синглтон паттерн - можно создать только одну сущность
class Session
{
    const SESSION_STARTED = true;
    const SESSION_NOT_STARTED = false;

    // Текущее состояние сессии
    private $sessionState = self::SESSION_NOT_STARTED;

    // Собственно, сущность-синглтон
    private static $instance;

    private function __construct() {}

    // Создает instance, если еще не создан
    // Возвращает instance
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        self::$instance->startSession();
        return self::$instance;
    }

    // Запускает сессию, если не запущена
    public function startSession()
    {
        if ($this->sessionState == self::SESSION_NOT_STARTED) {
            try {
                $this->sessionState = session_start();
            } catch (Error $e) {
                throw new SessionException('Session error: '.$e->getMessage(), 500);
            }
        }
        return $this->sessionState;
    }

    // Устанавливает данные при обращении: $session->var = $data;
    public function __set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    // Возвращает данные при обращении: $sesssion->var
    // Если их нет - ничего не вернет
    public function __get($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    // Возвращает информацию о наличии/отсутсвии при вызове isset() или empty()
    public function __isset($name)
    {
        return isset($_SESSION[$name]);
    }

    // Удаляет данные из сессии при вызове unset()
    public function __unset($name)
    {
        unset($_SESSION[$name]);
    }

    // Уничтожает текущую сессию, если она запущена.
    // Возвращает true если сессия была удалена, иначе false
    public function destroy()
    {
        if ($this->sessionState == self::SESSION_STARTED) {
            $this->sessionState = !session_destroy();
            unset($_SESSION);
            return !$this->sessionState;
        }
        return false;
    }
}
