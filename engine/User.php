<?php

class User
{
	public $id, $name, $hash, $email, $date;

	public static function authentication(Session &$session, DBConnection &$db)
	{
		$msg = '';
		if (isset($session->user))
		{
			if (!isset($_POST['logout'])) {
				return [unserialize($session->user), $msg];
			}
			unset($session->user);
		}
		else if (isset($_POST['username']) && isset($_POST['password']))
		{
			$username = $db->escape($_POST['username']);
			$q = "SELECT `id`, `username`, `password`, `email`, `date` 
				  FROM `users`
				  WHERE `username` = '$username'
				  LIMIT 1";

			if ($data = $db->query($q))
			{
				if (password_verify($_POST['password'], $data[0]['password']))
				{
					$user = new User($data[0]['id'],
									 $data[0]['username'],
									 $data[0]['password'],
									 $data[0]['email'],
									 $data[0]['date']);
					$session->user = serialize($user);
					return [$user, $msg];
				}
				else $msg = 'password incorrect';
			}
			else $msg = 'username incorrect';
		}
		return [NULL, $msg];
	}

	public function __construct($id, $name, $hash, $email, $date)
	{
		$this->id = $id;
		$this->name = $name;
		$this->hash = $hash;
		$this->email = $email;
		$this->date = $date;
	}
}