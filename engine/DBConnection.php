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
		public function insert($table, $data) {}
		// INSERT INTO $table ($keys) VALUES ($data[0]), ($data[1]), ... 
		public function insertMany($table, $data, $keys = []) {}
		// SELECT $cols FROM $table WHERE $where LIMIT $limit
		public function select($table, $data, $cols = ['*'], $where = '', $limit = 0) {}
		// UPDATE $table SET $data[0]->key, ... WHERE $where LIMIT $limit
		public function update($table, $data, $where = '', $limit = 0) {}
		// DELETE FROM $table WHERE $where LIMIT $limit
		public function delete($table, $where, $limit = 0) {}
		// TRUNCATE TABLE $table
		public function truncate($table) {}

	}