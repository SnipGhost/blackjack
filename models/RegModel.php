<?php

class RegModel extends Model
{
    public function checkUserName($username)
    {
        $username = $this->db->escape($username);
        $result = $this->db->query("SELECT username FROM users WHERE username = '".$username."' LIMIT 1");
        return !($result);
    }
}
