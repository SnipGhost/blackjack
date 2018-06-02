<?php global $user, $login_err; if (is_null($user)): ?>
	<form class="login-panel" action="" method="POST">
		<a class="btn reg" href="/<?=BASE_URI?>reg">Регистрация</a>
		<?php if ($login_err != '') echo '<span class="error-msg">', $login_err, '</span>'; ?>
		<input name="username" placeholder="Логин" type="text"/>
		<input name="password" placeholder="Пароль" type="password"/>
		<button class="btn" name="login" type="submit">Войти</button>
	</form>
<?php else: ?>
	<form class="login-panel" method="POST">
		<span class="ok-msg"><?=$user->name?></span>
		<button class="btn" name="logout">
			<!-- <div class="material-icons md-light">exit_to_app</div> -->
			Выйти
		</button>
	</form>
<?php endif; ?>