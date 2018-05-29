<div class="box">
	<center><h2>Tables list</h2></center>
	<?php
        if ($data) {
            foreach ($data as $row) {
                echo $row[key($row)].'<br>';
            }
        }
    ?>
</div>