<?php

class CabController extends Controller
{
    public function actionUpload() 
    {
        // Если файл не приложен к форме
        if (!isset($_FILES['file']['name'])) {
            // TODO: исправьте перенаправление, когда исправите эти странные урлы
            header('Location: ' . BASE_URI . 'cab#kit');
        }
        $page = array(
            'title' => 'Загрузка',
            'template' => 'page.php',
            'content' => 'cab/UploadView.php',
        );
        $this->view->display($page);
    }
}
