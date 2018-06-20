<?php

class PageController extends Controller
{
    public function actionOpi()
    {
        if((isset($_POST['num_kand']))&&(isset($_POST['kand_button'])))
        {
            $mas=array('2','3','4','5','6','7');
            if(in_array($_POST['num_kand'],$mas))
            {
            $page = array(
                'title'    => 'ОПИ',
                'template' => 'page.php',
                'content'  => 'offers/opi_quiz.php',
                'scripts'  => ['js/opi.js'],
                'num_kand' => $_POST['num_kand'],
            );
            $this->view->display($page);
            }
            else
            {
                $page = array(
                    'title'    => 'ОПИ',
                    'template' => 'page.php',
                    'content'  => 'offers/opi.php',
                    'scripts'  => ['js/opi.js'],
                );
                $this->view->display($page);
            }
        }
        else
        {
            $page = array(
                'title'    => 'ОПИ',
                'template' => 'page.php',
                'content'  => 'offers/opi.php',
                'scripts'  => ['js/opi.js'],
            );
            $this->view->display($page);
        }
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
            $page = array(
                'title'    => 'Личный кабинет',
                'template' => 'page.php',
                'content'  => 'cab/cab_notReg.php'
            );
            $this->view->display($page);
        }
    }
}
