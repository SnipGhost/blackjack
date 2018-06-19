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
        global $user;
        if(!is_null($user))
        {
            $page = array(
                'title'    => 'КИТ',
                'template' => 'page.php',
                'content'  => 'offers/kitReg.php'
            );
        }
        else
        {
            $page = array(
                'title'    => 'КИТ',
                'template' => 'page.php',
                'content'  => 'offers/kitNotReg.php'
            );
        }
        $this->view->display($page);
    }
    public function actionCab()
    {
        global $user;
        if(!is_null($user))
        {
            $page = array(
                'title'    => 'Личный кабинет',
                'template' => 'page.php',
                'content'  => 'cab/cab_main.php'
            );
            $this->view->display($page);
        }
        else{
            $this->actionKit(); //Сделать адекватный переход
        }
    }
    public function actionAboutTeam()
    {
        $page = array(
            'title'    => 'О команде',
            'template' => 'page.php',
            'content'  => 'main/about_team.php'
        );
        $this->view->display($page);
    }
//    public function actionPartners() // Пока не требуется
//    {
//        $page = array(
//            'title'    => 'Партнёры',
//            'template' => 'page.php',
//            'content'  => 'main/partners.php'
//        );
//        $this->view->display($page);
//    }
    public function actionSupport()
    {
        $page = array(
            'title'    => 'Поддержка',
            'template' => 'page.php',
            'content'  => 'main/support.php'
        );
        $this->view->display($page);
    }
}
