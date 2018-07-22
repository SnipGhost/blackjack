<?php global $user, $login_err; if (is_null($user)): ?>
	<form  action="" method="POST">
		<div class="login-panel">
			<a class="btn reg" href="/<?=BASE_URI?>reg">Регистрация</a>
			<?php if ($login_err != ''): ?>
				<a class="error-msg" href="/<?=BASE_URI?>reestablish">Восстановить пароль</a>;
				<input name="email" placeholder="Email" type="text" style="color:red;" value="<?=$_POST['email']?>"/>
				<input name="password" placeholder="Пароль" type="password"style="color:red;"/>
			<?php else: ?>
				<input name="email" placeholder="Email" type="text"/>
				<input name="password" placeholder="Пароль" type="password"/>
			<?php endif; ?>
			<button class="btn" name="login" type="submit">Войти</button>
		</div>
</form>
<?php else: ?>
	<form class="login-panel" method="POST">
		<a href="/<?=BASE_URI?>cab#profile" class="ok-msg"><?=$user->email?></a>
		<button class="btn" name="logout">
			<!-- <div class="material-icons md-light">exit_to_app</div> -->
			Выйти
		</button>
	</form>
<?php endif; ?>