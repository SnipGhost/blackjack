<html>
<head>
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/main.css" />
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/icons.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>	
<body>

	<div class="header">
		<div class="header-content">
			<?php require 'templates/login.php'; ?>
		</div>
	</div>

	<div class="wrapper">
		<div class="allin-block">
			<a href="/<?=BASE_URI?>" id="logo">
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
							<div class="offer-title noselect">
								ОПИ
								<div class="offer-ttext">
								ОПРЕДЕЛЕНИЕ ПОТЕНЦИАЛА ИЗБИРАЕМОСТИ
								</div>
							</div>
							<div class="offer-content">
							Разработка и реализация индивидуальных репутационных программ для публичных личностей
							</div><br>
                            <a href="/<?=BASE_URI?>opi" id="offer-button-link">
                                <div class="offer-button noselect">
                                    Попробовать
                                </div>
                            </a>
					</div>
					<div id="kik" class="offer">
						<div class="offer-title noselect">
							КИТ
							<div class="offer-ttext">
								Комплекс избирательных технологий
							</div>
						</div>
						<div class="offer-content">
							Комплекс избирательных технологий, обеспечивающих информационных воздействий с прогнозируемой социальной реацией
						</div>
                        <a href="/<?=BASE_URI?>kit" id="offer-button-link">
                            <div class="offer-button noselect">
                                Попробовать демо
                            </div>
                        </a>
					</div>
					<div id="smt" class="offer">
						<div class="offer-title noselect">
							РЕМ
							<div class="offer-ttext">
								Репутационный менеджмент<br><br>
							</div>
						</div>
						<div class="offer-content">
							Проектирование и внедрение репутационных стратегий для предприятий и организаций разных масштабов
						</div>
                        <a href="/<?=BASE_URI?>rem" id="offer-button-link">
                            <div class="offer-button noselect">
                                Узнать подробнее
                            </div>
                        </a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once ROOT."templates/footer.php"; ?>

</body>
</html>