<div class="content-box">
	<?php
		if(!isset($ex)){
			$keys = array_keys($data);
			
			foreach($keys as $k)
			{
				$value = $data[$k];
				echo '<div class="progress-bar-wrap">';
				echo "<span class=\"progress-bar-text\">$k: </span>";
				echo '<div class="progress-bar">';
				if($value>=10)
					echo '<div class="progress-data" style="width: '.$value.'%;">'.round($value,2).'%</div></div><br>';
				else
					echo '<div class="progress-data" style="width: 10%;">'.round($value,2).'%</div></div><br>';
				echo '</div>';
			}
		}
		else
		{
			Echo "Что-то пошло не так:\n";
			Echo "$msg";
		}
	?>
</div>