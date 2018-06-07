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
					ОПИ	
				</div>
				<div class="content-box-semititle">
						Определение потенциала избираемости
				</div>	
				<div>
						Разработка и реализация индивидуальных репутационных программ для публичных личностей
				</div>
			</div>
			<div class="content-box-opi">
				<div class="content-box-semititle">
						Форма для определения потенциала
				</div>	
				<div>
						Необходимо заполнить и нажать анализ
				</div>
				<div class="test-block">
					<div class="radio-block">
						Привязка кандидата к округу	<br>
						<div class="inblock-string"><p>Кандидат в округе не живет и не работает</p><input type="radio" name="kand_okr" value="neither"></div><br>
						<div class="inblock-string"><p>Кандидат работает в округе </p><input type="radio" name="kand_okr" value="work"></div><br>
						<div class="inblock-string"><p>Кандидат живет в округе </p><input type="radio" name="kand_okr" value="live"></div><br>
						<div class="inblock-string"><p>Кандидат живет и работает в округе </p><input type="radio" name="kand_okr" value="both"></div><br>
					</div>
					<div class="radio-block">
						Возраст кандидата	<br>
						<div class="inblock-string"><p>Возраст <25 или >75 лет</p><input type="radio" name="age" value="old"></div><br>
						<div class="inblock-string"><p>Возраст 25-30 или 65-75 лет</p><input type="radio" name="age" value="not_so_old"></div><br>
						<div class="inblock-string"><p>Возраст 40-65 лет</p><input type="radio" name="age" value="normal"></div><br>
					</div>
					<div class="radio-block">
						Поддержка кандидата общественностью	<br>
						<div class="inblock-string"><p>Поддержка кандидата известными популярными у населения крупными общественными организациями</p><input type="radio" name="support" value="great_sup"></div><br>
						<div class="inblock-string"><p>Поддержка достаточно известными организациями</p><input type="radio" name="support" value="big_sup"></div><br>
						<div class="inblock-string"><p>Поддержка прочими организациями</p><input type="radio" name="support" value="sup"></div><br>
						<div class="inblock-string"><p>Отсутствие поддержки</p><input type="radio" name="support" value="no_sup"></div><br>
					</div>
					<div class="radio-block">
						Образование кандидата	<br>
						<div class="inblock-string"><p>Среднее образование</p><input type="radio" name="education" value="general"></div><br>
						<div class="inblock-string"><p>Незаконченное высшее образование</p><input type="radio" name="education" value="unfinished"></div><br>
						<div class="inblock-string"><p>Высшее образование</p><input type="radio" name="education" value="higher"></div><br>
					</div>
					<div class="radio-block">
						Показатель предпочтительности деятельности кандидата	<br>
						<div class="minitext">Выбирается по мнению эксперта в зависимости от сформировавшихся в данной местности представлений о социальной значимости той или иной профессии</div>
						<div class="inblock-string"><p>0</p><input type="radio" name="Way_of_life" value="0"></div><br>
						<div class="inblock-string"><p>1</p><input type="radio" name="Way_of_life" value="1"></div><br>
						<div class="inblock-string"><p>2</p><input type="radio" name="Way_of_life" value="2"></div><br>
						<div class="inblock-string"><p>3</p><input type="radio" name="Way_of_life" value="3"></div><br>
						<div class="inblock-string"><p>4</p><input type="radio" name="Way_of_life" value="4"></div><br>
						<div class="inblock-string"><p>5</p><input type="radio" name="Way_of_life" value="5"></div><br>
					</div>
					<div class="radio-block">
						Харизма кандидата	<br>
						<div class="inblock-string"><p>Кандидат - яркая, харизматичная личность</p><input type="radio" name="charisma" value="great"></div><br>
						<div class="inblock-string"><p>Кандидат способен проявить себя как сильная личность, но не всегда</p><input type="radio" name="charisma" value="well"></div><br>
						<div class="inblock-string"><p>Кандидат - тихоня</p><input type="radio" name="charisma" value="bad"></div><br>
					</div>
					<div class="radio-block">
						Личная известность кандидата	<br>
						<div class="inblock-string"><p>Кандидат не известен даже соседям</p><input type="radio" name="celebrity" value="bad"></div><br>
						<div class="inblock-string"><p>Кандидат известен узкому кругу людей</p><input type="radio" name="celebrity" value="normal"></div><br>
						<div class="inblock-string"><p>Кандидат известен практически всему округу</p><input type="radio" name="celebrity" value="well"></div><br>
						<div class="inblock-string"><p>Кандидат хорошо известен в городе</p><input type="radio" name="celebrity" value="great"></div><br>
					</div>
					<div class="radio-block">
						Оттенок популярности	<br>
						<div class="inblock-string"><p>Кандидат позитивно известен жителям округа</p><input type="radio" name="kind_cel" value="good"></div><br>
						<div class="inblock-string"><p>Кандидат известен жителям с негативных сторон</p><input type="radio" name="kind_cel" value="bad"></div><br>
						<div class="inblock-string"><p>Кандидат в разных ситуациях проявляет себя по-разному</p><input type="radio" name="kind_cel" value="so_so"></div><br>
					</div>
					<div class="test-button noselect">
							Анализ
					</div>
				</div>
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
				</p>
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