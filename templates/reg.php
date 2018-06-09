<html>
<head>
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/main.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>

	<div class="wrapper">
		<div class="allin-block">
			<a href="/<?=BASE_URI?>" id="logo">
				<div></div>
				<span>Лого</span>
			</a>
			<div class="reg-form inline-flex">
				<div class="reg-title-block noselect">
					<div class="title-startup">START</div><div class="title-startup orange">UP</div>
					<div class="title-main">ANALYTICS</div>
					<div class="title-name">
						<div>Научно-инженерное<br>репутационное агентство</div>
					</div>
				</div>
				<div>
					<div class = "reg-block">
						<div>
							<div class="line title">
								Регистрация
								<div class = "semititle">
									Создание нового пользователя
								</div>
							</div>
							<div class="line">
								<span class="orange"><?=$msg?></span>
							</div>
							<div class="line">
								<input type="text" name="username" placeholder="Логин" required/>
							</div>

							<div class="line">
								<input type="password" name="password" placeholder="Пароль" required/>
							</div>

							<div class="line">
								<input type="password" name="retype"placeholder="Повторите пароль" required/>
							</div>

							<div class="line">
								<input type="email" name="email" placeholder="Электронная почта"  required/>
							</div>
						</div>
					</div>
					<div class="buttons">
						<a href="/<?=BASE_URI?>">
							<div class = "button-back">
								Назад
							</div>
						</a>
							<button type="submit" name="reg" class = "button-reg">
								Регистрация
							</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once ROOT."templates/footer.php"; ?>	
</body>
</html>