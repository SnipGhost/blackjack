<?php

include_once ROOT.'models/RegModel.php';

class RegController extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new RegModel();
    }

    public function regMain($msg = '') {
        $page = array(
            'content'  => 'reg/RegForm.php',
            'title'    => 'Регистрация',
            'template' => 'reg.php',
            'msg'      => $msg, 
        );
        $this->view->display($page);
    }
    
    public function actionReg()
    {
        global $user;
        // Если пользователь уже залогинен, то
        //  игнорируем его запрос на actionReg
        if (!is_null($user)) {
            header('Location: /'.BASE_URI);
            return;
        }

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
                'template' => 'reg.php',
            );
            $this->view->display($page);

        } else {
            $this->regMain();
        }
    }
}
