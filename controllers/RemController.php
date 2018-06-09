<?php

include_once ROOT.'models/RemModel.php';

class RemController extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new RemModel();
    }

    public function actionRem()
    {
        $page = array(
            'title' => 'РЕМ',
            'template' => 'rem.php',
        );
        $this->view->display($page);
    }
}
