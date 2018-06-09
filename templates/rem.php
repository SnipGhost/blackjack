<html>
<head>
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/icons.css" />
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/main.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>	
<body>
	<div class="header">
		<div class="header-content">
			<?php require 'templates/login.php'; ?>
			<!-- TODO: верните красивые кнопки! -->
			<!-- <form class="auth" action="" method="POST">
				<button>
					<div class="material-icons md-light">exit_to_app</div>
				</button>
			</form> -->
		</div>
	</div>

	<div class="wrapper">
		<div class="opi-allin-block">
			<a href="#" id="logo">
				<div></div>
				<span>Лого</span>
			</a>
			<div class="title-block noselect">
				<div class="title-name">
					Научно-инженерное репутационное агентство
				</div>
				<div class="inline-flex">
					<div class="title-startup">START</div><div class="title-startup orange">UP</div>
					<div class="title-main">ANALYTICS</div>
				</div>
			</div>
		</div>
		<div id="block-about">
			<div class="content-box-opi">
				<div class="content-box-title">
					РЕМ	
				</div>
				<div class="content-box-semititle">
						Репутационный менеджмент
				</div>	
				<div>
				Мелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснениеМелкое пояснение
				</div>
			</div>
			<div class="content-box">
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			Большое Длинное Пояснение 	
			</div>	
		</div>
	</div>

	<div class="footer"> <!-- Нижний блок -->
		<div class="footer-content">
            <div class="footer-content-right">
				<p id="address">
					Адрес: <br>
					Ул.Пушкина, д.9, кв.45 <br>
					8 (916) 922 95 32 <br>
					8 (915) 945 53 38 <br>
				</label>
			</div>
			<div class="footer-content-left">
				<a href="#" id="about-command">О команде</a>
				<a href="#" id="partner">Партнёры</a>
				<a href="#" id="support">Поддержка</a>
                <br>
				<a id="version">Текущая версия: <?=VERSION?></a>
				<a id="startup-analytics">© 2018 Startup-Analytics.com</a>
			</div>
			<div style="clear: both;"></div>
		</div>
	</div>
</body>
</html>