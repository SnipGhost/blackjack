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
}
