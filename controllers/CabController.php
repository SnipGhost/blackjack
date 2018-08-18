<?php

//require_once ROOT.'engine/LoadFile.php';
require_once ROOT.'data/Classes/PHPExcel.php';
require_once ROOT.'models/CabModel.php';

class CabController extends Controller
{
    public function __construct() {
        $this->view = new View();
        $this->model = new CabModel();
    }
    public function actionUpload() 
    {
        global $db;
		global $user;
		if(is_null($user)){
			//редирект в личный кабинет
            header("Location: ".BASE_URI."cab#profile");
		}
		else{
			$user->refresh($db);
			$filename="";
			try {
				$filename = $this->loadFile($_FILES['file'], 'data/upload/', 'xls', 10000000);
			} catch (UploadException $e) {
				$page = array(
					'title' => 'Загрузка',
					'template' => 'page.php',
					'content' => 'cab/UploadErr.php',
					'msg' => 'Ошибка загрузки файла на сервер.',
					'ex' =>$e,
				);
				$this->view->display($page);
			}
			try{
				$data = $this->handleFile($filename);
			}
			catch (HandleException $e)
			{
				$page = array(
					'title' => 'Загрузка',
					'template' => 'page.php',
					'content' => 'cab/UploadErr.php',
					'msg' => 'Ошибка при обработке файла на сервере.',
					'ex' =>$e,
				);
				$this->view->display($page);    
			}
			$page = array(
				'title' => 'Загрузка',
				'template' => 'page.php',
				'content' => 'cab/UploadView.php',
				'msg'=>'',
				'data'=>$data,
			);
			$this->view->display($page);
		}
    }
    // Закомментить/раскомментить DEBUG-код можно
	// применив regexp:   (\t*)(//)*(.+// DEBUG$)
	// закомментить:      $1//$3
	// раскомментить:     $1$3
	//-----------------------------------------------------
	// Если у вас нормальный regexp-интерпретатор, то
	// замените / на \/ в регулярном выражении (sublime)
	//-----------------------------------------------------

	// Проверяет и сохраняет указанный файл из POST-запроса
	// $file - массив с данынми файла из $_FILES
	// $dir  - директория, в которую необходимо загрузить
	// $ext  - предполагаемое расширение файла
	// $size - максимальный размер файла в байтах
	// Возвращает имя файла после сохранения (полный путь)
	function loadFile($file, $dir, $ext, $size)
	{
		// Если файл не приложен к форме
		if (!isset($file['name'])) {
			header('Location: ' . BASE_URI . 'cab#kit');
		}

		// Поверяем пользователя
		global $user;
		if (is_null($user)) {
			throw new UploadException(UPLOAD_S_ERR_AUTH);
		}

		//echo "Некоторая отладочная информация:\n"; // DEBUG
		//print_r($file);                            // DEBUG

		// Добавим проверочку на ошибки подгрузки файла
		if ($file['error'] !== UPLOAD_ERR_OK) { 
			throw new UploadException($file['error']);
		}

		// Обратите внимение!
		// На директорию $uploaddir должны быть выданы права пользователю, от которого
		// запускается веб-сервер и php, для Apache-а это пользователь _www
		// Для этого можно сделать: sudo chown _www data/upload
		$uploaddir = ROOT . $dir;

		switch ($ext) {
			case 'xls':
				$types = array('application/vnd.ms-excel','application/octet-stream');
				break;
			default:
				$types = array('text/plain');
				break;
		}

		// Проверка MIME-типов
		if (!in_array($file['type'], $types)) {
			echo $file['type'];
			throw new UploadException(UPLOAD_S_ERR_WRONG_TYPE);
        }
        $buf = count(explode(".",$file['name']))-1;
        $file_ext = explode(".",$file['name'])[$buf];
        if($file_ext!=="xls")
        {
			echo "$file_ext";
			throw new UploadException(UPLOAD_S_ERR_WRONG_TYPE);
		}
		// Проверка размеров файла (уже после загрузки!)
		// А проверка до - только через php.ini, переменные:
		// upload_max_filesize и post_max_size
		if ($file['size'] > $size) {
			throw new UploadException(UPLOAD_S_ERR_WRONG_SIZE);
		}
        $uploadfile = $uploaddir . md5(date('l jS \of F Y h:i:s A')). '.' . $ext;
		
		// Перемещение в постоянное хранилище
		if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
			throw new UploadException(UPLOAD_S_ERR_MOVE_FILE);
        }
        
        // TODO: Безопасная проверка содержимого файла (?)
        // Ошибка - UPLOAD_S_ERR_WRONG_CONTENT
		$excel = PHPExcel_IOFactory::load($uploadfile);
        try{
            $buf = $excel->getSheetNames();
			if(!in_array("Исходные параметры",$buf))
			{
				echo "Ломаюсь тут";
				throw new UploadException(UPLOAD_S_ERR_WRONG_CONTENT);
			}
            
        }
        catch(Exception $e){
            unlink($uploadfile);
            throw new UploadException(UPLOAD_S_ERR_WRONG_CONTENT);
        }
        global $user;
        if(!is_null($user->file)){
            //TODO прикрутить обработку ошибки удаления файла
            unlink($user->file);
        }
        $this->model->updateUserFile($user->id,$uploadfile);

		//echo "Файл корректен и был успешно загружен.\n"; // DEBUG
		return $uploadfile;
    }
    function handleFile($filename)
	{
		global $user;
		$params = PHPExcel_IOFactory::load(ROOT."data/params.xls");
		try{
			$excel = PHPExcel_IOFactory::load($filename);
		}
		catch (exception $ex)
		{
			throw new HandleException(HANDLE_ERR_OPEN);
		}
		$params = $params->getSheetByName("params");
		$chuv = $params->getCellByColumnAndRow(5,30)->getValue();
		$days = $params->getCellByColumnAndRow(5,31)->getValue();
		$z = $params->getCellByColumnAndRow(5,32)->getValue();
		try{
			$aud = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 4)->getValue();//Количество избирателей в округе
			$zhit = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 5)->getValue();//Количество жителей в округе
			$yav = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 6)->getValue();//Процент явки
			//TODO проверка на нули
			$pres = array(0,0,0,0,0);
			$promres = array();
			$cands[] = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 11)->getValue();
			$cands[] = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 12)->getValue();
			$cands[] = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 13)->getValue();
			$cands[] = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 14)->getValue();
			$cands[] = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 15)->getValue();
		}
		catch(exception $ex)
		{
			throw new HandleException(HANDLE_ERR_STARTPARAMS);
		}
		try{
			foreach ($excel->getSheetNames() as $lName)
			{
				if(($lName !== "Исходные параметры")&&($lName !== "Результат"))
				{
					$list = $excel->getSheetByName($lName);
					$day = $list->getCellByColumnAndRow(3,2)->getValue();//День. Важно, чтобы данный параметр был корректным!
					$remainDays = $days - $day;
					$k1 = $params->getCellByColumnAndRow($day,22)->getValue();
					$k2 = $params->getCellByColumnAndRow($day,23)->getValue();
					unset($dayparam);
					unset($kaud);
					unset($kk1);
					unset($kk2);
					unset($kk3);
					unset($kk4);
					unset($kk5);
					unset($pk);
					unset($kres);

					$kres=array(0,0,0,0,0);
					$pk=array();
					$dayparam=array();
					$kaud = array();
					$kk1=array();
					$kk2=array();
					$kk3=array();
					$kk4=array();
					$kk5=array();
					for($i=0;$i<5;$i++)
					{
						$pk[]=$params->getCellByColumnAndRow($day,25+$i)->getValue();
					}
					$fon = 0;
					for($i=0;$i<18;$i++)//TODO исправить количество параметров (в данной таблице не хватает строк)
					{
						$dayparam[]=$params->getCellByColumnAndRow($day,2+$i)->getValue();
						if(!is_null($list->getCellByColumnAndRow(5,7+$i)->getValue())){
							$kaud[] = $list->getCellByColumnAndRow(5,7+$i)->getValue();
							}
							else
							{
								$kaud[] = 0;
							}
						if(!is_null($list->getCellByColumnAndRow(6,7+$i)->getValue())){
							$kk1[] = $list->getCellByColumnAndRow(6,7+$i)->getCalculatedValue();
							}
							else
							{
								$kk1[] = 0;
							}
						if(!is_null($list->getCellByColumnAndRow(7,7+$i)->getValue())){
							$kk2[] = $list->getCellByColumnAndRow(7,7+$i)->getValue();
							}
							else
							{
								$kk2[] = 0;							
							}
						if(!is_null($list->getCellByColumnAndRow(8,7+$i)->getValue())){
							$kk3[] = $list->getCellByColumnAndRow(8,7+$i)->getValue();
							}
							else
							{
								$kk3[] = 0;
							}
						if(!is_null($list->getCellByColumnAndRow(9,7+$i)->getValue())){
							$kk4[] = $list->getCellByColumnAndRow(9,7+$i)->getValue();
							}
							else
							{
								$kk4[] = 0;
							}
						if(!is_null($list->getCellByColumnAndRow(10,7+$i)->getValue())){
								$kk5[] = $list->getCellByColumnAndRow(10,7+$i)->getValue();
							}
							else
							{
								$kk5[] = 0;
							}
						$kres[0]+=$kaud[$i]*$pk[0]*$dayparam[$i]*$k1*$kk1[$i]*(1-$k2*$remainDays);
						$kres[1]+=$kaud[$i]*$pk[1]*$dayparam[$i]*$k1*$kk2[$i]*(1-$k2*$remainDays);
						$kres[2]+=$kaud[$i]*$pk[2]*$dayparam[$i]*$k1*$kk3[$i]*(1-$k2*$remainDays);
						$kres[3]+=$kaud[$i]*$pk[3]*$dayparam[$i]*$k1*$kk4[$i]*(1-$k2*$remainDays);
						$kres[4]+=$kaud[$i]*$pk[4]*$dayparam[$i]*$k1*$kk5[$i]*(1-$k2*$remainDays);
						$fon += $dayparam[$i]*$kaud[$i];
					}
					$kfon = 1 - 2*$fon/($chuv*$aud);
					$kz = pow((1-$z),$remainDays);
					for($i=0;$i<5;$i++){
						$kres[$i]*=$kfon;
						$kres[$i]*=$kz;
					}
					$promres[]=$kres;
				}
			}
		}
		catch(exception $ex)
		{
			throw new HandleException(HANDLE_ERR_LISTS);
		}
		foreach($promres as $s)
		for($j=0;$j<5;$j++)
		{
			$pres[$j]+=$s[$j];
		}
        for($i=0;$i<5;$i++)
        if(!is_null($cands[$i]))
            $res[$cands[$i]]=$pres[$i];
        //Запись результата в файл
        $excel->createSheet();
        $page = $excel->setActiveSheetIndex($excel->getSheetCount()-1);
        $page->setTitle("Результат");
        $j=1;
        for ($i=1;$i<=count($cands);$i++)
        {
            if(!is_null($cands[$i-1])){
                $page->setCellValue("A".$j,$cands[$i-1]);
                $page->setCellValue("B".$j,$pres[$i-1]);
                $j++;
            }
        }
        $objWriter = new PHPExcel_Writer_Excel5($excel);
        $objWriter->save($filename);

        $this->model->updateUserFile($user->id,$filename);
		return $res;
	}    
}
