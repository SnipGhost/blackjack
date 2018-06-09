<?php

class OpiController extends Controller
{
    public function actionOpi()
    {
        $page = array(
            'title' => 'ОПИ',
            'template' => 'page.php',
            'content' => 'offers/opi.php',
        );
        $this->view->display($page);
    }
}
