<?php

// Пример переопределения модели для подключения к базе данных

class MainModel extends Model
{
    public function getData()
    {
        return $this->db->select('users', '*');
    }

    public function getTablesList()
    {
        return $this->db->query('SHOW TABLES');
    }

    public function checkUserName($username)
    {
        $username = $this->db->escape($username);
        $result = $this->db->query("SELECT username FROM users WHERE username = '".$username."' LIMIT 1");
        return !($result);
    }
}
