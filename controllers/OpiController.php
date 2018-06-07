<?php

include_once ROOT.'models/OpiModel.php';

class OpiController extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new OpiModel();
    }

    public function actionOpi()
    {
        $page = array(
            'title' => 'ОПИ',
            'template' => 'opi.php',
        );
        $this->view->display($page);
    }
}
