<?php

include_once ROOT.'models/RegModel.php';

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
}
