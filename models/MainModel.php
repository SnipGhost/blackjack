<?php

// Пример переопределения модели для подключения к базе данных

class MainModel extends Model
{
	public function getData()
	{
		global $db;
		return $db->query("SELECT * FROM Классы");
	}
	public function getTablesList()
	{
		global $db;
		return $db->query("SHOW TABLES");
	}
}