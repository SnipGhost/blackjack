<div class="box">
	<center><h2>Just example!</h2></center>
	<?php
		if ($data) {
			foreach ($data as $row) {
				foreach ($row as $key => $value) {
					echo $key.' = '.$value.'<br>';
				}
				echo '<br>';
			}
		}
	?>
</div>