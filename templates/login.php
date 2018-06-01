<?php global $user, $login_err; if (is_null($user)): ?>
	<form class="login-panel" action="" method="POST">
		<?php if ($login_err != '') echo '<span class="error-msg">', $login_err, '</span>'; ?>

		
		<input name="username" placeholder="Логин" type="text"/>
		<input name="password" placeholder="Пароль" type="password"/>

		<button name="login" type="submit">
			<!-- <div class="material-icons md-light">exit_to_app</div> -->
			Войти
		</button>
		
	</form>
<?php else: ?>
	<form class="login-panel" method="POST">
		<span class="ok-msg">Пользователь: <?=$user->name?></span>
		<button name="logout">
			<!-- <div class="material-icons md-light">exit_to_app</div> -->
			Выйти
		</button>
	</form>
<?php endif; ?>