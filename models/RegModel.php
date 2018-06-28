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
    
    public function checkPass($nowid, $nowpass)
    {
        $nowpass = $this->db->escape($nowpass);
        try {
            $q = "SELECT `id`, `password` 
				  FROM `users`
				  WHERE `id` = '".$nowid."'
                  LIMIT 1";
            if ($result = $this->db->query($q)) {
                return password_verify($nowpass, $result[0]['password']);
            }
        } catch (DataBaseException $e) {
            throw $e;
        }
	}
    public function changePass($nowid, $newpass)
    {
        global $user; 
        global $session;
        $newpass = password_hash($newpass, PASSWORD_DEFAULT);
        try {
            $q = "UPDATE `users` 
                  SET `password` = '".$newpass."'
                  WHERE `id` = '".$nowid."'";
            $result = $this->db->query($q);
            $user->hash = $newpass;
            $session->user = serialize($user);
        } catch (DataBaseException $e) {
            $result = false;
        }
        return $result;
    }
    public function changeEmail($nowid, $newemail)
    {
        global $user; 
        global $session;
        $newemail = $this->db->escape($newemail);
        try {
            $q = "UPDATE `users` 
                  SET `email` = '".$newemail."'
                  WHERE `id` = '".$nowid."'";
            $result = $this->db->query($q);
            $user->email = $newemail;
            $session->user = serialize($user);
        } catch (DataBaseException $e) {
            $result = false;
        }
        return $result;
    } 
}
