<?php

require_once ROOT.'engine/LoadFile.php';
require_once ROOT.'engine/ReadFile.php';
require_once ROOT.'data/Classes/PHPExcel.php';

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
