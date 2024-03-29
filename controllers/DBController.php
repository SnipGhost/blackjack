<?php

include_once ROOT.'models/DBModel.php';

class DBController extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new DBModel();
    }

    public function actionIndex()
    {
        $page = array(
            'content' => 'db/IndexView.php',
            'title' => 'Таблицы',
        );
        $this->view->display($page);
    }

    public function actionInsert()
    {
        $data = $this->model->insert();
        $page = array(
            'content' => 'db/QueryView.php',
            'title' => 'Результат',
            'data' => $data,
        );
        $this->view->display($page);
    }

    public function actionInsertMany()
    {
        $data = $this->model->insertManyToUsers();
        $page = array(
            'content' => 'db/QueryView.php',
            'title' => 'Результат',
            'data' => $data,
        );
        $this->view->display($page);
    }

    public function actionSelect()
    {
        $data = $this->model->select();
        $page = array(
            'content' => 'db/QueryView.php',
            'title' => 'Результат',
            'data' => $data,
        );
        $this->view->display($page);
    }

    public function actionUpdate()
    {
        $data = $this->model->update();
        $page = array(
            'content' => 'db/QueryView.php',
            'title' => 'Результат',
            'data' => $data,
        );
        $this->view->display($page);
    }

    public function actionDelete()
    {
        $data = $this->model->delete();
        $page = array(
            'content' => 'db/QueryView.php',
            'title' => 'Результат',
            'data' => $data,
        );
        $this->view->display($page);
    }

    public function actionTruncate()
    {
        $data = $this->model->truncate();
        $page = array(
            'content' => 'db/QueryView.php',
            'title' => 'Результат',
            'data' => $data,
        );
        if ($data) {
            $data = $this->model->insertManyToTest();
            $page = array(
                'content' => 'db/QueryView.php',
                'title' => 'Результат',
                'data' => $data,
            );
        }
        $this->view->display($page);
    }
}
