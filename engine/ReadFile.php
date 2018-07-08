<?php
require_once ROOT.'data/Classes/PHPExcel.php';

function readRes()
    {
        global $user;
        $excel = PHPExcel_IOFactory::load($user->file);
        if(in_array("Результат",$excel->getSheetNames()))
        {
            $page = $excel ->getSheetByName("Результат");
            $i=1;
            $res=array();
            while(!is_null($page->getCell('A'.$i)->getValue()))
            {
                $res[$page->getCell('A'.$i)->getValue()] = $page->getCell('B'.$i)->getValue();
                $i++;
            }
            return $res;
        }
    }