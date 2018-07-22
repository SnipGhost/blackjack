<?php

include_once ROOT.'models/RegModel.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ROOT.'data/Classes/PHPmail/src/Exception.php';
require ROOT.'data/Classes/PHPmail/src/PHPMailer.php';
require ROOT.'data/Classes/PHPmail/src/SMTP.php';

class RegController extends Controller
{
    public function redirect() {
        header('Location: /'.BASE_URI);
        exit(0);
    }
    
    
    public function checkLogin() {
        global $user;
        return !is_null($user);
    }
    
    public function __construct() {
        $this->view = new View();
        $this->model = new RegModel();
    }
    public function actionCab()
    {
        global $user;
        if(!is_null($user))
        {
            $msg = "Сожалеем, но ваш аккаунт не авторизирован. Подтвердите, пожалуйста, регистрацию через электронную почту.";
            if (isset($_POST['reactiv'])) // Real?
            {
                $msg = "Письмо повторно выслано вам на почту. перейдите по ссылке в письме и обновите эту страницу.";
                $this->sendMail($user->email,$this->makeMail($user->email));
            }
            if($user->activation)
            {
                $page = array(
                    'title'    => 'Личный кабинет',
                    'template' => 'page.php',
                    'content'  => 'cab/cab_main.php'
                );
                $this->view->display($page);
            }
            else{
                $page = array(
                    'title'    => 'Личный кабинет',
                    'template' => 'page.php',
                    'content'  => 'cab/cab_notActiv.php',
                    'msg'=>$msg
                );
                $this->view->display($page);
            }
        }
        else{
            $page = array(
                'title'    => 'Личный кабинет',
                'template' => 'page.php',
                'content'  => 'cab/cab_notReg.php'
            );
            $this->view->display($page);
        }
    }
    public function regMain($msg = '') {
        $page = array(
            'content'  => 'reg/RegForm.php',
            'title'    => 'Регистрация',
            'template' => 'pageCreateChange.php',
            'msg'      => $msg, 
        );
        $this->view->display($page);
    }

    public function changePassMain($msg = '') {
        $page = array(
            'content'  => 'changePass/ChangePassForm.php',
            'title'    => 'Изменение пароля',
            'template' => 'pageCreateChange.php',
            'msg'      => $msg, 
        );
        $this->view->display($page);
    }
    
    public function changeEmailMain($msg = '') {
        $page = array(
            'content'  => 'changeEmail/ChangeEmailForm.php',
            'title'    => 'Изменение Email',
            'template' => 'pageCreateChange.php',
            'msg'      => $msg, 
        );
        $this->view->display($page);
    }
    
    public function actionChangeEmailMain() {
        if (!$this->checkLogin()) $this->redirect();
        
        if (isset($_POST['changeEmail'],
                  $_POST['new-email'],          // old-pass
                  $_POST['password'])) {        // repeat-new-pass
            
            try
            {
                global $user; // [TO DO]
                if (!$this->model->checkPass($user->id, $_POST['password'])) {
                    $this->changeEmailMain('Пароль введён неверно');
                    return;
                } 
                if (!$this->model->changeEmail($user->id, $_POST['new-email'])) {
                    $this->changeEmailMain('Ошибка при изменении Email, попробуйте еще раз');
                    return;
                }  
            } catch (DataBaseException $e) {
                $this->changeEmailMain('База данный сайта временно не работает');
            }

            $page = array(
                'content'  => 'changeEmail/ChangeEmailEnd.php',
                'title'    => 'Email изменён',
                'template' => 'pageCreateChange.php',
            );
            $this->view->display($page);

        } else {
            $this->changeEmailMain();
        }
    }
    
    public function actionChangePassMain() {
        if (!$this->checkLogin()) $this->redirect();
        
        if (isset($_POST['changePass'],
                  $_POST['now-pass'],             
                  $_POST['new-pass'],             
                  $_POST['repeat-new-pass'])) {   

            if ($_POST['new-pass'] != $_POST['repeat-new-pass']) { // Изменил
                $this->changePassMain('Вы повторили пароль неверно');
                return;
            }
            
            try {
                global $user; // [TO DO]
                if (!$this->model->checkPass($user->id, $_POST['now-pass'])) {
                    $this->changePassMain('Старый пароль введён неверно');
                    return;
                } 
                if (!$this->model->changePass($user->id, $_POST['new-pass'])) {
                    $this->changePassMain('Ошибка при изменении пароля, попробуйте еще раз');
                    return; 
                }
            } catch (DataBaseException $e) {
                $this->changePassMain('База данный сайта временно не работает');
            }

            $page = array(
                'content'  => 'changePass/ChangePassEnd.php',
                'title'    => 'Пароль изменён',
                'template' => 'pageCreateChange.php',
            );
            $this->view->display($page);

        } else {
            $this->changePassMain();
        }
    }
    
    public function actionReg()
    {
        if ($this->checkLogin()) $this->redirect();

        if (isset($_POST['reg'],
                  $_POST['password'],
                  $_POST['retype'],
                  $_POST['email'])) {

            if ($_POST['retype'] != $_POST['password']) {
                $this->regMain('Вы повторили пароль неверно');
                return;
            }
	
			if (!$this->model->checkUserField('email', $_POST['email'])) {
				$this->regMain('Пользователь с таким email уже есть');
                return;
			}

            if (!$this->model->addUser($_POST['password'], $_POST['email'])) {
                $this->regMain('Ошибка при добавлении пользователя, попробуйте еще раз');
                return;
            }
            $this->sendMail($_POST['email'],$this->makeMail($_POST['email']));
            $page = array(
                'content'  => 'reg/RegEnd.php',
                'title'    => 'Завершение регистрации',
                'template' => 'pageCreateChange.php',
            );
            $this->view->display($page);

        } else {
            $this->regMain();
        }
    }
    public function actionActiv()
    {
        $token = explode('\r',$_GET['token'])[0];
        $id = $this->model->checkActivation($token);
        $this->model->setActivation($id,1);
        header("Location: ./");
    }
    public function sendMail($email,$message)
    {
        $mail = new PHPmailer(true);

        // TODO: Обязательно вынести все константы в отдельный файл!
        //       + Сделать функцию sendMail универсальной (передавать все как параметры)
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'startupanalytics.mail@gmail.com';  // SMTP username
        $mail->Password = 'gfd12hgf';                         // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        
        // Recipients
        $mail->setFrom('startupanalytics.mail@gmail.com','StartUp Analytics Team');
        $mail->addAddress($email);   

        // Content
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Подтверждение регистрации';
        $mail->MsgHTML($message);
        $mail->send();
    }
    //function makeReeMail($token, $email)
    //{
    //    $token = md5("I'm ".$email."activate me plz")."_".md5(date("d.m.Y H:i:s"));
    //    $this->model->createToken($email,$token);
    //    $link = 'http://localhost/'.BASE_URI.'activation?token='.$token;
    //    $message  = '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><div style="font-family: Arial; font-size: 12px;">';
    //    $message .= "<p>Здравствуйте,</p>";
    //    $message .= "<p>Спасибо за регистрацию на сайте StartUpAnalytics.ru!</p>";
    //    $message .= "<p>Пожалуйста, подтвердите Вашу регистацию здесь:</p>";
    //    $message .= "<p><a target=\"blank\" href=\"$link\">Прямая ссылка - $link</a></p>";
    //    $message .= "<p>Ваш email Пользователя StartUpAnalytics:<br>".$email."</p>";
    //    $message .= "<p>Мы надеемся увидеть Вас скоро на нашем сайте!</p>";
    //    $message .= "<p>Команда StartUpAnalytics</p> <br>";
    //    $message .= "<p>P.S. Данное письмо отправляется автоматически, отвечать на него не нужно</p>";
    //    $message .= "<p>Если Вы думаете, что получили это сообщение по-ошибке, пожалуйста, проигнорируйте это письмо.</p></div>";
    //    return $message;
    //}
    function makeMail($email)
    {
        $token = md5("I'm ".$email."activate me plz")."_".md5(date("d.m.Y H:i:s"));
        $this->model->createToken($email,$token);
        $link = 'http://localhost/'.BASE_URI.'activation?token='.$token;
        $message  = '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><div style="font-family: Arial; font-size: 12px;">';
        $message .= "<p>Здравствуйте,</p>";
        $message .= "<p>Спасибо за регистрацию на сайте StartUpAnalytics.ru!</p>";
        $message .= "<p>Пожалуйста, подтвердите Вашу регистацию здесь:</p>";
        $message .= "<p><a target=\"blank\" href=\"$link\">Прямая ссылка - $link</a></p>";
        $message .= "<p>Ваш email Пользователя StartUpAnalytics:<br>".$email."</p>";
        $message .= "<p>Мы надеемся увидеть Вас скоро на нашем сайте!</p>";
        $message .= "<p>Команда StartUpAnalytics</p> <br>";
        $message .= "<p>P.S. Данное письмо отправляется автоматически, отвечать на него не нужно</p>";
        $message .= "<p>Если Вы думаете, что получили это сообщение по-ошибке, пожалуйста, проигнорируйте это письмо.</p></div>";
        return $message;
    }

    public function actionReestablish(){
        $msg="";
        if (isset($_POST['Reestablish'],
                  $_POST['email'])) {   
            if($this->model->checkEmail($_POST['email']))
            {
                $this->sendMail($_POST['email'], $this->makeMail($_POST['email']));
                $page = array(
                    'content'  => 'Reestablish/ReestablishEnd.php',
                    'title'    => 'Восстановление пароля',
                    'template' => 'pageCreateChange.php',
                );
                $this->view->display($page);
            }
            else{
                $msg="Введен неверный email";
            $page = array(
                'content'  => 'Reestablish/ReestablishForm.php',
                'title'    => 'Восстановление пароля',
                'template' => 'pageCreateChange.php',
                'msg'      => $msg, 
            );
            $this->view->display($page);
            }
        } else {
            $page = array(
                'content'  => 'Reestablish/ReestablishForm.php',
                'title'    => 'Восстановление пароля',
                'template' => 'pageCreateChange.php',
                'msg'      => $msg, 
            );
            $this->view->display($page);
        }
    }
}
