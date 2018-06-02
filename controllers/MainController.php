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
}
