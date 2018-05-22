<?php

include_once ROOT.'models/RegModel.php';

class RegController extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new RegModel();
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
