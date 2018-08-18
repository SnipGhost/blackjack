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
    public function getUserID($email)
    {
        $email = $this->db->escape($email);
        try {
            $q = "SELECT id FROM users WHERE email = '".$email."' LIMIT 1";
            $result = $this->db->query($q);
            $result = $result[0]['id'];
        } catch (Exception $e) {
            $result = -1;
        }
        return $result;
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
    public function changePassNoUser($nowid, $newpass)
    {
        global $session;
        $newpass = password_hash($newpass, PASSWORD_DEFAULT);
        try {
            $q = "UPDATE `users` 
                  SET `password` = '".$newpass."'
                  WHERE `id` = '".$nowid."'";
            $result = $this->db->query($q);
        } catch (DataBaseException $e) {
            $result = false;
        }
        return $result;
    }
    public function setActivation($nowid, $status)
    {
        global $user; 
        global $session;
        try {
            $q = "UPDATE `users` 
                  SET `Activation` = '".$status."'
                  WHERE `id` = ".$nowid;
            $result = $this->db->query($q);
        } catch (DataBaseException $e) {
            $result = false;
        }
        return $result;
    }
    public function checkActivation($token)
    {
        try {
            $q = "SELECT UserID FROM Activation
                  WHERE Token LIKE '".$token."%'";
            $result = $this->db->query($q);
                $result = $result[0]['UserID'];
        } catch (DataBaseException $e) {
            $result = -1;
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
    public function createToken($email,$token)
    {
        global $session;
        $res=true;
        $id=false;
        try {
            $q = "SELECT `ID` FROM `users`
                  WHERE `email` = '".$email."'";
                  $result = $this->db->query($q);
                    $id=$result[0]['ID'];
        } catch (DataBaseException $e) {
            $res=false;
            echo "ошибка в поиске ID\n";
        }
        try {
            $q = 'INSERT INTO Activation  (Token,UserID,date)
                  VALUES ("'.$token.'",'.$id.',"'.date('l jS \of F Y h:i:s A').'")';
            $result = $this->db->query($q);

        } catch (DataBaseException $e) {
            $res = false;
            echo "ошибка в добавлении записи\n";
        }
        return $res;
    }
    public function deleteToken($userID)
    {
        $q="DELETE FROM Activation WHERE UserID = ".$userID;
        $res = $this->db->query($q);
        return $res;
    }
    public function checkEmail($email)
    {
        try {
            $q = "SELECT `ID` FROM `users`
                  WHERE `email` = '".$email."'";
                  $result = $this->db->query($q);
                  if(count($result)==0)
                  $res = false;
                  else $res = true;
        } catch (DataBaseException $e) {
            $res=false;
        }
        return $res;
    }
}
