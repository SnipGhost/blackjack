<?php

include_once ROOT.'models/RegModel.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require ROOT.'data/Classes/PHPmail/src/Exception.php';
require ROOT.'data/Classes/PHPmail/src/PHPMailer.php';
require ROOT.'data/Classes/PHPmail/src/SMTP.php';
require_once ROOT.'engine/readFile.php';


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
                $this->sendMail($user->email,['Подтверждение регистрации',$this->makeMail($user->email)]);
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
        if(isset($_POST['g-recaptcha-response']))
        {
            $recaptcha = $_POST['g-recaptcha-response'];
            if(!empty($recaptcha)) {
                $recaptcha = $_REQUEST['g-recaptcha-response'];
                $secret = '6LdMvGYUAAAAAEBDdN0VXyT3AtlMgqYhkYLgAGCC';
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret ."&response=".$recaptcha."&remoteip=".$_SERVER['REMOTE_ADDR'];
            
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_TIMEOUT, 10);
                curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
                $curlData = curl_exec($curl);
            
                curl_close($curl);  
                $curlData = json_decode($curlData, true);
    
                if($curlData['success']) {
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
                else{
                    $this->changeEmailMain('Не пройден тест "Я не робот"');
                }
            }
            else {
                $this->changeEmailMain('Не пройден тест "Я не робот"');
            }
        }
        else {
            $this->changeEmailMain();
        }
    }
    
    public function actionChangePassMain() {
        if (!$this->checkLogin()) $this->redirect();
        
        if(isset($_POST['g-recaptcha-response']))
        {
            $recaptcha = $_POST['g-recaptcha-response'];
            if(!empty($recaptcha)) {
                $recaptcha = $_REQUEST['g-recaptcha-response'];
                $secret = '6LdMvGYUAAAAAEBDdN0VXyT3AtlMgqYhkYLgAGCC';
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret ."&response=".$recaptcha."&remoteip=".$_SERVER['REMOTE_ADDR'];
            
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_TIMEOUT, 10);
                curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
                $curlData = curl_exec($curl);
            
                curl_close($curl);  
                $curlData = json_decode($curlData, true);
    
                if($curlData['success']) {
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
                }else {
                    $this->changePassMain('не пройден тест "Я не робот"');
                }
            }else {
                $this->changePassMain('не пройден тест "Я не робот"');
            }
        }else {
            $this->changePassMain();
        }
    }
    
    public function actionReg()
    {
        if ($this->checkLogin()) $this->redirect();
        if(isset($_POST['g-recaptcha-response']))
        {
            $recaptcha = $_POST['g-recaptcha-response'];
            if(!empty($recaptcha)) {
                $recaptcha = $_REQUEST['g-recaptcha-response'];
                $secret = '6LdMvGYUAAAAAEBDdN0VXyT3AtlMgqYhkYLgAGCC';
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret ."&response=".$recaptcha."&remoteip=".$_SERVER['REMOTE_ADDR'];
            
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_TIMEOUT, 10);
                curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
                $curlData = curl_exec($curl);
            
                curl_close($curl);  
                $curlData = json_decode($curlData, true);
    
                if($curlData['success']) {
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
                $this->sendMail($_POST['email'],['Подтверждение регистрации',$this->makeMail($_POST['email'])]);
                $page = array(
                    'content'  => 'reg/RegEnd.php',
                    'title'    => 'Завершение регистрации',
                    'template' => 'pageCreateChange.php',
                );
                $this->view->display($page);

            } else {
                $this->regMain('');
            }
                } else {
                    $this->regMain('Пройдите проверку "Я не робот"');
                }
            }
            else {
                $this->regMain('');
            }
        }
        else{
            $this->regMain('');
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
        $mail->Host = 'startupanalytics.ru';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'ourTeam@startupanalytics.ru';  // SMTP username
        $mail->Password = 'gfd12hgfgfd12hgf';                         // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
        
        // Recipients
        $mail->setFrom('ourTeam@startupanalytics.ru','StartUp Analytics Team');
        $mail->addAddress($email);   
        
        // Content
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $message[0];
        $mail->MsgHTML($message[1]);
        $mail->send();
    }
    function makeMail($email)
    {
        $token = md5("I'm ".$email."activate me plz")."_".md5(date("d.m.Y H:i:s"));
        $this->model->createToken($email,$token);
        $link = 'http://'.HOSTNAME.'/'.BASE_URI.'activation?token='.$token;
        $message  = '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><div style="font-family: Arial; font-size: 12px;">';
        $message .= "<p>Здравствуйте,</p>";
        $message .= "<p>Спасибо за регистрацию на сайте StartUpAnalytics.ru!</p>";
        $message .= "<p>Пожалуйста, подтвердите Вашу регистацию здесь:</p>";
        $message .= "<p>Прямая ссылка - <a target=\"blank\" href=\"$link\">$link</a></p>";
        $message .= "<p>Ваш email Пользователя StartUpAnalytics:<br>".$email."</p>";
        $message .= "<p>Мы надеемся увидеть Вас скоро на нашем сайте!</p>";
        $message .= "<p>Команда StartUpAnalytics</p> <br>";
        $message .= "<p>P.S. Данное письмо отправляется автоматически, отвечать на него не нужно</p>";
        $message .= "<p>Если Вы думаете, что получили это сообщение по-ошибке, пожалуйста, проигнорируйте это письмо.</p></div>";
        return $message;
    }
    function makeReeMail($email,$newpass)
    {
        $message  = '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><div style="font-family: Arial; font-size: 12px;">';
        $message .= "<p>Здравствуйте, ".$email."</p>";
        $message .= "<p>Спасибо за использование сайта StartUpAnalytics.ru!</p>";
        $message .= "<p>Восстановление пароля прошло успешно,</p>";
        $message .= "<p>Ваш новый пароль для входа в профиль: ".$newpass."</p>";
        $message .= "<p>Никому его не показывайте и не забудьте его поменять на новый</p>";
        $message .= "<p>Мы надеемся увидеть Вас скоро на нашем сайте!</p>";
        $message .= "<p>Команда StartUpAnalytics</p> <br>";
        $message .= "<p>P.S. Данное письмо отправляется автоматически, отвечать на него не нужно</p>";
        $message .= "<p>Если Вы думаете, что получили это сообщение по-ошибке, пожалуйста, проигнорируйте это письмо или обратитесь в служду технической поддержки.</p></div>";
        return $message;
    }
    public function actionReestablish(){
        $msg="";
        if(isset($_POST['g-recaptcha-response']))
        {
            $recaptcha = $_POST['g-recaptcha-response'];
            if(!empty($recaptcha)) {
                $recaptcha = $_REQUEST['g-recaptcha-response'];
                $secret = '6LdMvGYUAAAAAEBDdN0VXyT3AtlMgqYhkYLgAGCC';
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret ."&response=".$recaptcha."&remoteip=".$_SERVER['REMOTE_ADDR'];
            
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_TIMEOUT, 10);
                curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
                $curlData = curl_exec($curl);
            
                curl_close($curl);  
                $curlData = json_decode($curlData, true);
    
                if($curlData['success']) {
        
                    if (isset($_POST['Reestablish'],
                            $_POST['email'])) {   
                        if($this->model->checkEmail($_POST['email']))
                        {
                            $newpass=md5(date("His").$_POST['email'].date("dmY"));
                            $this->model->changePassNoUser($this->model->getUserID($_POST['email']),$newpass);
                            $this->sendMail($_POST['email'], ['Восстановление пароля',$this->makeReeMail($_POST['email'],$newpass)]);
                            $page = array(
                                'content'  => 'Reestablish/ReestablishEnd.php',
                                'title'    => 'Восстановление пароля',
                                'template' => 'pageCreateChange.php',
                            );
                            $this->view->display($page);
                            return;
                        }
                        else{
                        }
                    } else {
                        $msg="Введен неверный email";
                    }
                }
                else{
                    $msg="Не пройдена проверка \"Я не робот\"";
                }
            }
        }
        else{
            if(isset($_POST['Reestablish']))
                $msg = "Не пройдена проверка \"Я не робот\"";
        }
        $page = array(
            'content'  => 'Reestablish/ReestablishForm.php',
            'title'    => 'Восстановление пароля',
            'template' => 'pageCreateChange.php',
            'msg'      => $msg, 
        );
        $this->view->display($page);
    }
}
