<?php

include_once ROOT.'models/MainModel.php';

class MainController extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new MainModel();
    }

    public function actionIndex()
    {
        $page = array(
            'title' => 'Главная',
            'template' => 'template.php',
        );
        $this->view->display($page);
    }

    public function actionTables()
    {
        $data = $this->model->getTablesList();
        $page = array(
            'content' => 'main/TablesView.php',
            'data' => $data,
            'title' => 'Таблицы',
        );
        $this->view->display($page);
    }

    public function regMain($msg = '') {
        $page = array(
            'content' => 'reg/RegForm.php',
            'title' => 'Регистрация',
            'msg' => $msg,
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
                  $_POST['username'],
                  $_POST['password'],
                  $_POST['retype'],
                  $_POST['email'])) {

            if ($_POST['retype'] != $_POST['password']) {
                $this->regMain('Вы повторили пароль неверно');
                return;
            }

            if (!$this->model->checkUserName($_POST['username'])) {
                $this->regMain('Пользователь с таким логином уже есть');
                return;
            }

            if (!$this->model->addUser($_POST['username'], $_POST['password'], $_POST['email'])) {
                $this->regMain('Ошибка при добавлении пользователя');
                return;
            }

            $page = array(
                'content' => 'reg/RegEnd.php',
                'title' => 'Завершение регистрации',
            );
            $this->view->display($page);

        } else {
            $this->regMain();
        }
    }
}
