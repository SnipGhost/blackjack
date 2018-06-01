<html>
<head>
	<title>Шаблон</title>
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/main.css" />
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/icons.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>	
<body>
	<div class="header">
		<div class="header-content">
			<form class="auth" action="" method="POST">
				<button>
					<div class="material-icons md-light">exit_to_app</div>
				</button>
			</form>
		</div>
	</div>
	<div class="wrapper">
		<div class="allin-block">
			<a href="#" id="logo">
				<div></div>
				<span>Лого</span>
			</a>
			<div class="title-block noselect">
				<div class="title-startup">START</div><div class="title-startup orange">UP</div>
				<div class="title-main">ANALYTICS</div>
				<div class="title-name">
					<div>Научно-инженерное<br>репутационное агентство</div>
				</div>
			</div>
		</div>
		<div id="block-about">
			<div class="content-box">
				<div class="content-box-title">О Сайте</div>
				<div class="ab-box">
					<div class="ab-pic">
						<img src=img/main-1.png>
					</div>
					<div class="ab-text">
						<div class="ab-title">Описание</div>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
						</p>
					</div>
				</div>
				<div class="ab-box">
					<div class="ab-pic">
						<img src=img/main-2.png>
					</div>
					<div class="ab-text">
						<div class="ab-title">Наши плюсы</div>
						<p>
						Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.
						</p>
					</div>
				</div>
			</div>
		</div>
		<div id="block-offers">
			<div class="content-box">
				<div class="content-box-title">Наши предложения</div>
				<div class="offers-wrap">
					<div id="opi" class="offer">
							<div class="offer-title">
								ОПИ
							</div>
							<div class="offer-ttext">
								ОПРЕДЕЛЕНИЕ ПОТЕНЦИАЛА ИЗБИРАЕМОСТИ
							</div>
							<div class="opi-box">
								Разработка и реализация индивидуальных репутационных программ для публичных личностей
							</div>
							<div class="castil-block"></div>
					</div>
					<div id="kik" class="offer">
						<div class="offer-title">
							КИК
							<div class="offer-ttext">
								Комплекс избирательных технологий
							</div>
						</div>
						<div class="offer-content">
							Содержимое с текстом
						</div>
						<div class="offer-button">
							Это типа кнопка, докрути
						</div>
					</div>
					<div id="smt" class="offer"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer"> <!-- Нижний блок -->
		<div class="footer-content">
            <div class="footer-content-right">
            <p id="address">                Адрес: <br>
                            Ул.Пушкина, д.9, кв.45 <br>
                                 8 (916) 922 95 32 <br>
                                 8 (915) 945 53 38 <br>
            </p>
            </div>
                <div class="footer-content-left">
                <a href="#" id="about-command">О команде</a>
                <a href="#" id="partner">Партнёры</a>
                <a href="#" id="support">Поддержка</a>
                <a id="startup-analytics">© 2018 Startup-Analytics.com</a>
            </div>
            <div style="clear: both;"></div>
		</div>
	</div>
</body>
</html>