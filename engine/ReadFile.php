<?php
	function handleFile($filename)
	{
		$params = PHPExcel_IOFactory::load("/Library/WebServer/Documents/blackjack/data/params.xls");
		$excel = PHPExcel_IOFactory::load($filename);
		$params = $params->getSheetByName("params");
		$chuv = $params->getCellByColumnAndRow(5,23)->getValue();
		$days = $params->getCellByColumnAndRow(5,24)->getValue();
		$z = $params->getCellByColumnAndRow(5,25)->getValue();
		$aud = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 4)->getValue();//Количество избирателей в округе
		$zhit = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 5)->getValue();//Количество жителей в округе
		$yav = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 6)->getValue();//Процент явки
		$pres = array(0,0,0,0,0);
		$promres = array();
		$cands[] = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 11)->getValue();
		$cands[] = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 12)->getValue();
		$cands[] = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 13)->getValue();
		$cands[] = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 14)->getValue();
		$cands[] = $excel->getSheetByName("Исходные параметры")->getCellByColumnAndRow(3, 15)->getValue();
		foreach ($excel->getSheetNames() as $lName)
		{
			if($lName !== "Исходные параметры")
			{
				$list = $excel->getSheetByName($lName);
				$day = $list->getCellByColumnAndRow(3,2)->getValue();//День. Важно, чтобы данный параметр был корректным!
				$remainDays = $days - $day;
				$k1 = $params->getCellByColumnAndRow($day,15)->getValue();
				$k2 = $params->getCellByColumnAndRow($day,16)->getValue();
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
					$pk[]=$params->getCellByColumnAndRow($day,18+$i)->getValue();
				}
				$fon = 0;
				for($i=0;$i<10;$i++)//TODO исправить количество параметров (в данной таблице не хватает строк)
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
		foreach($promres as $s)
		for($j=0;$j<5;$j++)
		{
			$pres[$j]+=$s[$j];
		}
		for($i=0;$i<5;$i++)
		$res[$cands[$i]]=$pres[$i];
		return $res;
	}