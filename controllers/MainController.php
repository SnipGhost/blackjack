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
    
    public function actionReg()
    {
        if (isset($_POST['reg'],
                  $_POST['username'],
                  $_POST['password'],
                  $_POST['retype'],
                  $_POST['email'])) {

            // TODO: Реализовать добавление пользователя

            $page = array(
                'content' => 'reg/RegEnd.php',
                'title' => 'Завершение регистрации',
                'data' => $this->model->checkUserName($_POST['username']),
            );
            $this->view->display($page);

        } else {
            $page = array(
                'content' => 'reg/RegForm.php',
                'title' => 'Регистрация',
            );
            $this->view->display($page);
        }
    }
}
