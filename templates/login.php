<?php global $user, $login_err; if (is_null($user)): ?>
	<form class="login-panel" action="" method="POST">
		<?php if ($login_err != '') echo '<span id="error-msg">', $login_err, '</span>'; ?>
		<input name="username" placeholder="Логин" type="text"/>
		<input name="password" placeholder="Пароль" type="password"/>
		<button name="login" type="submit">Войти</button>
	</form>
<?php else: ?>
	<form class="login-panel" method="POST">
		Пользователь: <?=$user->name?>
		<button name="logout">Выход</button>
	</form>
<?php endif ?>