<?php

class User
{
    public $id;
    public $hash;
    public $email;
    public $date;
    public $file;
    public $activation;

    public static function authentication(Session &$session, DBConnection &$db)
    {
        $msg = '';
        if (isset($session->user)) {

            if (!isset($_POST['logout'])) {
                return [unserialize($session->user), $msg];
            }
            unset($session->user);

        } elseif (isset($_POST['login'], $_POST['email'], $_POST['password'])) {

            $email = $db->escape($_POST['email']);
            $q = "SELECT `id`, `password`, `email`, `date` , `file`, `Activation`
				  FROM `users`
				  WHERE `email` = '$email'
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
                $msg = 'Неверный email';
            }
            
        }
        return [null, $msg];
    }
    public function refreshFile(DBConnection $db)
    {   
        $q = "SELECT `file`
				  FROM `users`
				  WHERE `email` = '$this->email'
                  LIMIT 1";
        if ($data = $db->query($q)) {
            $this->file = $data[0]['file'];
        }
        else 
        throw new Exception();
    }
    public function __construct($userData)
    {
        $this->id = $userData['id'];
        $this->hash = $userData['password'];
        $this->email = $userData['email'];
        $this->date = $userData['date'];
        $this->file = $userData['file'];
        $this->activation = $userData['Activation'];
    }
    
}
