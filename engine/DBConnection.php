<?php

	class DBConnection
	{
		public $mysqli;

		public function __construct($host, $user, $password, $dbName)
		{
			$this->connect($host, $user, $password, $dbName);	
		}

		public function connect($host, $user, $password, $dbName)
		{
			$this->mysqli = new mysqli($host, $user, $password, $dbName);

			if ($this->mysqli->connect_errno)
				throw new DataBaseException('Could not connect: ' . $this->mysqli->connect_error, 500);

			if (!$this->mysqli->set_charset('utf8'))
				throw new DataBaseException('Error loading character set utf8: ' . $this->mysqli->error, 500);
		}

		public function query($query)
		{	
			if ($result = $this->mysqli->query($query)) {
				$num = 0;
				$data = array();
				while ($row = $result->fetch_assoc()) {
					$data[$num++] = $row;
				}
				$result->free();
				return $data;
			} else {
				throw new DataBaseException('Error while requesting', 500);
			}
		}

		public function close()
		{
			$this->mysqli->close();
		}

		// TODO: Реализовать шорткаты для SQL-команд

		// INSERT INTO $table SET $data[0]->key = $data[0]->value, ...
		public function insert($table, $data)
		{
			$table = $this->mysqli->real_escape_string($table);
			$query = 'INSERT INTO '.$table.' SET ';
			foreach ($data as $key => $value) {
				$key = $this->mysqli->real_escape_string($key);
				$value = $this->mysqli->real_escape_string($value);
				$query .= $key." = '".$value."', ";
			}
			$query = substr($query, 0, -2);
			return $this->mysqli->query($query);
		}
		// INSERT INTO $table ($keys) VALUES ($data[0]), ($data[1]), ... 
		public function insertMany($table, $data, $keys = [])
		{
			$table = $this->mysqli->real_escape_string($table);
			$query = 'INSERT INTO '.$table.' ';
			if (count($keys) != 0) {
				$query .= '(';
				foreach ($keys as $key) {
					$query .= $this->mysqli->real_escape_string($key).', ';
				}
				$query = substr($query, 0, -2).') ';
			}
			$query .= 'VALUES ';
			foreach ($data as $row) {
				$query .= '(';
				foreach ($row as $value) {
					$query .= "'".$this->mysqli->real_escape_string($value)."', ";
				}
				$query = substr($query, 0, -2).'), ';
			}
			$query = substr($query, 0, -2);
			return $this->mysqli->query($query);
		}
		// SELECT $cols FROM $table WHERE $where LIMIT $limit
		public function select($table, $keys = '*', $where = '', $order = '', $limit = 0)
		{
			$query = 'SELECT ';
			if ($keys === '*' || $keys === '') {
				$query .= '* FROM ';
			} else {
				foreach ($keys as $key) {
					$query .= $this->mysqli->real_escape_string($key).', ';
				}
				$query = substr($query, 0, -2).' FROM ';
			}
			$table = $this->mysqli->real_escape_string($table);
			$query .= $table;
			if ($where != '') {
				$where = $this->mysqli->real_escape_string($where);
				$query .= ' WHERE '.$where;
			}
			if ($order != '') {
				$order = $this->mysqli->real_escape_string($order);
				$query .= ' ORDER BY '.$order;
			}
			if ($limit != 0) {
				$limit = (string)$limit;
				$query .= ' LIMIT '.$limit;
			}
			return $this->query($query);
		}
		// UPDATE $table SET $data[0]->key, ... WHERE $where LIMIT $limit
		public function update($table, $data, $where = '', $limit = 0) {}
		// DELETE FROM $table WHERE $where LIMIT $limit
		public function delete($table, $where, $limit = 0) {}
		// TRUNCATE TABLE $table
		public function truncate($table) {}

	}