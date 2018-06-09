<?php

class RemController extends Controller
{
    public function actionRem()
    {
        $page = array(
            'title' => 'РЕМ',
            'template' => 'page.php',
            'content' => 'offers/rem.php'
        );
        $this->view->display($page);
    }
}
