<?php

class RegModel extends Model
{
    public function checkUserField($field, $value)
    {
		$value = $this->db->escape($value);
        try {
            $q = "SELECT email FROM users WHERE ".$field." = '".$value."' LIMIT 1";
            $result = $this->db->query($q);
        } catch (DataBaseException $e) {
            $result = true;
        }
        return !($result);
	}

    public function addUser($password, $email)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $email = $this->db->escape($email);
        try {
            $q = "INSERT INTO users (password, email)
                    VALUES ('".$password."', '".$email."')";
            $result = $this->db->query($q);
        } catch (DataBaseException $e) {
            $result = false;
        }
        return $result;
    }
}
