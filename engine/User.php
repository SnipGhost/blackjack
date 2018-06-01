<?php

class User
{
    public $id;
    public $name;
    public $hash;
    public $email;
    public $date;

    public static function authentication(Session &$session, DBConnection &$db)
    {
        $msg = '';
        if (isset($session->user)) {

            if (!isset($_POST['logout'])) {
                return [unserialize($session->user), $msg];
            }
            unset($session->user);

        } elseif (isset($_POST['login'], $_POST['username'], $_POST['password'])) {

            $username = $db->escape($_POST['username']);
            $q = "SELECT `id`, `username`, `password`, `email`, `date` 
				  FROM `users`
				  WHERE `username` = '$username'
                  LIMIT 1";

            if ($data = $db->query($q)) {
                if (password_verify($_POST['password'], $data[0]['password'])) {
                    // Придет не более 1 user-а, т.к. LIMIT 1
                    $user = new self($data[0]);
                    $session->user = serialize($user);
                    return [$user, $msg];
                } else {
                    $msg = 'Неверный пароль';
                }
            } else {
                $msg = 'Неверный логин';
            }
            
        }
        return [null, $msg];
    }

    public function __construct($userData)
    {
        $this->id = $userData['id'];
        $this->name = $userData['username'];
        $this->hash = $userData['password'];
        $this->email = $userData['email'];
        $this->date = $userData['date'];
    }
}
