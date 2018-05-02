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

	public function insertManyToUsers()
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

	public function insertManyToTest()
	{
		$keys = array('colname');
		$values = array(
			array('hit'),
			array('the'),
			array('road'),
			array('Jack'),
		);
		if ($this->db->insertMany('test', $values, $keys))
			return "Таблица успешно перенаполнена!";
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

	public function update()
	{
		$data = array('username' => 'snipghost', 'password' => 'test');
		$where = 'id = 2';
		$limit = 1;
		$result = $this->db->update('users', $data, $where, $limit);
		if ($result)
			return "Записи успешно обновлены!";
		return "Ошибка при обновлении данных!";
	}

	public function delete()
	{
		$where = "id > 3";
		$limit = 2;
		$result = $this->db->delete('users', $where, $limit);
		if ($result)
			return "Записи успешно удалены!";
		return "Ошибка при удалении данных!";
	}

	public function truncate()
	{
		$result = $this->db->truncate('test');
		if ($result)
			return "Таблица успешно очищена!";
		return "Ошибка при очищении таблицы!";
	}
}