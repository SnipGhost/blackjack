<?php

class DBModel extends Model
{
	public function insert($values)
	{
		if ($this->db->insert('users', $values))
			return "Запись успешно добавлена!";
		return "Ошибка при добавлении записи!";
	}
	public function insertMany($keys, $values)
	{
		if ($this->db->insertMany('users', $values, $keys))
			return "Записи успешно добавлены!";
		return "Ошибка при добавлении записей!";
	}
}