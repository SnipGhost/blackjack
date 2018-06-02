<?php

class RegModel extends Model
{
    public function checkUserField($field, $value)
    {
		$value = $this->db->escape($value);
        try {
            $q = "SELECT username FROM users WHERE ".$field." = '".$value."' LIMIT 1";
            $result = $this->db->query($q);
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
            $result = $this->db->query($q);
        } catch (DataBaseException $e) {
            $result = false;
        }
        return $result;
    }
}
