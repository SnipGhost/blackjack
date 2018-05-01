<?php

class DBModel extends Model
{
	public function insert()
	{
		$values = array('username' => 'test', 'password' => 'pass');
		if ($this->db->insert('users', $values))
			return "Запись успешно добавлена!";
		return "Ошибка при добавлении записи!";
	}

	public function insertMany()
	{
		$keys = array('username', 'password');
		$values = array(
			array('test_1', 'pass_1'),
			array('test_2', 'pass_2'),
			array('test_3', 'pass_3'),
		);
		if ($this->db->insertMany('users', $values, $keys))
			return "Записи успешно добавлены!";
		return "Ошибка при добавлении записей!";
	}

	public function select()
	{
		$cols = array('username', 'id');
		$where = 'id > 2';
		$order = 'id DESC';
		$limit = 5;
		$result = $this->db->select('users', $cols, $where, $order, $limit);
		if ($result)
			return $result;
		return "Ошибка при выборке данных!";
	}
}