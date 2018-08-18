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
        //unset($session->user);
        $msg = '';
        if (isset($session->user)) {
            if (!isset($_POST['logout'])) {
                if(isset($_COOKIE['rev']))
                {
                    if(User::checkRev($db,$_COOKIE['rev']))
                    {
                        return [unserialize($session->user), $msg];
                    }
                    else{
                        $tmpuser = unserialize($session->user);
                        $tmpuser->refresh($db);
                        $session->user = serialize($tmpuser);
                        $rev = md5(time().$tmpuser->id.$tmpuser->email);
                        setcookie('rev',$rev,time()+14400);
                        if(User::createRev($db,$tmpuser->id,$rev)){
                        //TODO написать обработчик ошибок
                        }
                    
                        return [$tmpuser,$msg];
                    }
                }
                else{
                    unset($session->user);
                }
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
                    $rev = md5(time().$user->id.$user->email);
                    setcookie('rev',$rev,time()+14400);
                    if(User::createRev($db,$user->id,$rev)){
                        //TODO написать обработчик ошибок
                    }
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
    public function refresh(DBConnection $db)
    {   $q = "SELECT `password`, `email`, `date` , `file`, `Activation`
				  FROM `users`
				  WHERE `email` = '$this->email'
                  LIMIT 1";
        if ($userData = $db->query($q)) {
            $this->hash = $userData[0]['password'];
            $this->email = $userData[0]['email'];
            $this->date = $userData[0]['date'];
            $this->file = $userData[0]['file'];
            $this->activation = $userData[0]['Activation'];
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
    public static function checkRev(DBConnection $db,$rev){
        $rev = $db->escape($rev);
        $q = "SELECT UserID,Rev
			  FROM Rev
			  WHERE Rev = '$rev'
              LIMIT 1";
        if (count($db->query($q))) {
                return 1;
        }
        else{
        }
        return 0;
    }
    public static function createRev(DBConnection $db,$UserID,$Rev){
        try{
            $Rev = $db->escape($Rev);
            $q = "INSERT INTO Rev (UserID, Rev)
            VALUES (".$UserID.", '".$Rev."')";
            if($db->query($q))
            {
                return 1;
            }
        }
        catch(Exception $e){
        }
        return 0;
    }
    public static function dropRev(DBConnection $db, $UserID){
        try{
            $Rev = $db->escape($Rev);
            $q = "DELETE FROM Rev WHERE UserID = ".$UserID;
            if($db->query($q))
            {
                return 1;
            }
        }
        catch(Exception $e){
        }
        return 0;
    }
}
