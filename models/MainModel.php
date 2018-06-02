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
        try {
            $result = $this->db->query("SELECT username FROM users WHERE username = '".$username."' LIMIT 1");
        } catch (DataBaseException $e) {
            $result = true;
        }
        return !($result);
    }

    public function addUser($username, $password, $email)
    {
        $username = $this->db->escape($username);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $email = $this->db->escape($email);
        try {
            $q = "INSERT INTO users (username, password, email)
                    VALUES ('".$username."', '".$password."', '".$email."')";
            echo $q;
            $result = $this->db->query($q);
        } catch (DataBaseException $e) {
            $result = false;
        }
        return $result;
    }
}
