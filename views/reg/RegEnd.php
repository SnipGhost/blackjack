<form action="" method="POST">
	<div class = "reg-block">
		<div class="reg-end">
			<?php
				echo 'Пользователь ', $_POST['email'], ' успешно добавлен.<br> Пожалуйста, подтвердите аккаунт через электронную почту';
			?>
		</div>
	</div>
	<div class="buttons reg-endb">
		<a href="/<?=BASE_URI?>">
			<div class = "button-back reg-end">
				Назад
			</div>
		</a>
	</div>
</form>