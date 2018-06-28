<?php

class CabController extends Controller
{
    public function actionUpload() 
    {
        $page = array(
            'title' => 'Загрузка',
            'template' => 'page.php',
            'content' => 'cab/UploadView.php',
        );
        $this->view->display($page);
    }
}
