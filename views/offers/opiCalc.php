<div class="content-box-opi">

	<div class="content-box-semititle">
		Результаты:
	</div>
	
	<br><br>

	<?php

		define('QUESTIONS_COUNT', 8);

		function multiply($row, $k)
		{
			for ($i = 0; $i < QUESTIONS_COUNT; $i++) {
				if (isset($row[$i])) {
					$row[$i] = floatval(intval($row[$i]) * $k[$i]);
				} else {
					$row[$i] = floatval(0); // Значение по-умолчанию
				}
				if ($i > 4) {
					$row[$i]++;
				}
			}
			return $row;
		}

		if (isset($_POST['aspt'])) {
			
			// Массив коэффициентов
			$kf = array(1, 0.8, 0.6, 0.7, 1, 0.25, 0.15, 0.3);

			for ($i = 0; $i < count($_POST['aspt']); $i++) {
				$matrix[$i] = multiply($_POST['aspt'][$i], $kf);
			}

			for ($i = 0; $i < count($matrix); $i++) {
				$res = 0;
				for ($j = 0; $j < count($matrix[$i]); $j++) {
					if ($j > 4) {
						$res *= $matrix[$i][$j];
					} else {
						$res += $matrix[$i][$j];
					}
				}
				$matrix[$i] = $res;
			}

			$sum = array_sum($matrix);
			if ($sum > 0) {
				for ($i = 1; $i <= count($matrix); $i++) {
					$value = round($matrix[$i-1] / $sum * 100, 1);
					echo '<div class="progress-bar-wrap">';
					echo "<span class=\"progress-bar-text\">Кандидат&nbsp;№$i: </span>";
					echo '<div class="progress-bar">';
					if($value>=10)
						echo '<div class="progress-data" style="width: '.$value.'%;">'.$value.'%</div></div><br>';
					else
						echo '<div class="progress-data" style="width: 10%;">'.$value.'%</div></div><br>';
					echo '</div>';
				}
			} else {
				echo "<h2>Ошибочные данные, повторите ввод</h2>";
			}

		} else {
			header('Location: ../opi'); // TODO: надо чет с этим делать. Плохо
		}
	?>

</div>