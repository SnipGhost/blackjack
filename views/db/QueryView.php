<div class="box">
	<center><h2>Результат запроса</h2></center>
	<?php
		if (gettype($data) == 'string') {
			echo $data;
		} else {
			foreach ($data as $row) {
				foreach ($row as $key => $value) {
					echo $key.' = '.$value.'<br>';
				}
				echo '<br>';
			}
		}
	?><br>
	<a href="/<?=BASE_URI?>db">Назад</a>
</div>