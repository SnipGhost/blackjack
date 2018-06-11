<?php

class PageController extends Controller
{
    public function actionOpi()
    {
        $page = array(
            'title'    => 'ОПИ',
            'template' => 'page.php',
            'content'  => 'offers/opi.php',
            'scripts'  => ['js/opi.js'],
        );
        $this->view->display($page);
    }

    public function actionOpiCalc()
    {
        $page = array(
            'title'    => 'ОПИ',
            'template' => 'page.php',
            'content'  => 'offers/opiCalc.php'
        );
        $this->view->display($page);
    }

    public function actionRem()
    {
        $page = array(
            'title'    => 'РЕМ',
            'template' => 'page.php',
            'content'  => 'offers/rem.php'
        );
        $this->view->display($page);
    }
    public function actionKit()
    {
        $page = array(
            'title'    => 'КИТ',
            'template' => 'page.php',
            'content'  => 'offers/kit.php'
        );
        $this->view->display($page);
    }
}
