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
<!--
				<div class="title-name">
					Научно-инженерное репутационное агентство
				</div>
-->
<!--				<div class="inline-flex">-->
<!--					<div class="title-startup">START</div><div class="title-startup orange">UP</div>-->
					<div class="title-main">STARTUPANALYTICS</div>
<!--				</div>-->
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
                    ФОРМА ДЛЯ ОПРЕДЕЛЕНИЯ ПОТЕНЦИАЛА
				</div>	
				<div>
						(необходимо заполнить и нажать кнопку "Анализ")
				</div>
				<div class="test-block">
					<div class="radio-block">
                        <div class="name-block">
                            Привязка кандидата к округу
                        </div>	
<!--                        <br>-->
						<div class="inblock-string"><input type="radio" id="RB0" name="kand_okr" value="neither"><label for="RB0">Кандидат в округе не живет и не работает</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB1" name="kand_okr" value="work"><label for="RB1">Кандидат работает в округе </label></div><br>
						<div class="inblock-string"><input type="radio" id="RB2" name="kand_okr" value="live"><label for="RB2">Кандидат живет в округе </label></div><br>
						<div class="inblock-string"><input type="radio" id="RB3" name="kand_okr" value="both"><label for="RB3">Кандидат живет и работает в округе </label></div><br>
					</div>
					<hr>
					<div class="radio-block">
                        <div class="name-block">
                            Возраст кандидата	
                        </div>	
<!--                        <br>-->
						<div class="inblock-string"><input type="radio" id="RB4" name="age" value="old"><label for="RB4">Возраст <25 или >75 лет</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB5" name="age" value="not_so_old"><label for="RB5">Возраст 25-30 или 65-75 лет</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB6" name="age" value="normal"><label for="RB6">Возраст 40-65 лет</label></div><br>
					</div>
					<hr>
					<div class="radio-block">
                        <div class="name-block">
                            Поддержка кандидата общественностью	
                        </div>	
<!--                        <br>-->
						<div class="inblock-string"><input type="radio" id="RB7" name="support" value="great_sup"><label for="RB7">Поддержка кандидата известными популярными у населения крупными общественными организациями</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB8" name="support" value="big_sup"><label for="RB8">Поддержка достаточно известными организациями</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB9" name="support" value="sup"><label for="RB9">Поддержка прочими организациями</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB10" name="support" value="no_sup"><label for="RB10">Отсутствие поддержки</label></div><br>
					</div>
					<hr>
					<div class="radio-block">
                        <div class="name-block">
                            Образование кандидата
                        </div>	
<!--                        <br>-->
						<div class="inblock-string"><input type="radio" id="RB11" name="education" value="general"><label for="RB11">Среднее образование</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB12" name="education" value="unfinished"><label for="RB12">Незаконченное высшее образование</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB13"  name="education" value="higher"><label for="RB13">Высшее образование</label></div><br>
					</div>
					<hr>
					<div class="radio-block">
                       <div class="name-block">
                            Показатель предпочтительности деятельности кандидата
                        </div>	
<!--                        <br>-->
						<div class="minitext">(выбирается по мнению эксперта в зависимости от сформировавшихся в данной местности представлений о социальной значимости той или иной профессии)</div>
						<div class="inblock-string"><input type="radio" id="RB14" name="Way_of_life" value="0"><label for="RB14">0</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB15" name="Way_of_life" value="1"><label for="RB15">1</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB16" name="Way_of_life" value="2"><label for="RB16">2</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB17" name="Way_of_life" value="3"><label for="RB17">3</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB18" name="Way_of_life" value="4"><label for="RB18">4</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB19" name="Way_of_life" value="5"><label for="RB19">5</label></div><br>
					</div>
					<hr>
					<div class="radio-block">
                        <div class="name-block">
                            Харизма кандидата
                        </div>	
<!--                        <br>-->
						<div class="inblock-string"><input type="radio" id="RB20" name="charisma" value="great"><label for="RB20">Кандидат - яркая, харизматичная личность</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB21" name="charisma" value="well"><label for="RB21">Кандидат способен проявить себя как сильная личность, но не всегда</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB22" name="charisma" value="bad"><label for="RB22">Кандидат - тихоня</label></div><br>
					</div>
					<hr>
					<div class="radio-block">
                        <div class="name-block">
                            Личная известность кандидата	
                        </div>		
<!--                        <br>-->
						<div class="inblock-string"><input type="radio" id="RB23" name="celebrity" value="bad"><label for="RB23">Кандидат не известен даже соседям</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB24" name="celebrity" value="normal"><label for="RB24">Кандидат известен узкому кругу людей</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB25" name="celebrity" value="well"><label for="RB25">Кандидат известен практически всему округу</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB26" name="celebrity" value="great"><label for="RB26">Кандидат хорошо известен в городе</label></div><br>
					</div>
					<hr>
					<div class="radio-block">
                        <div class="name-block">
                            Оттенок популярности	
                        </div>
<!--                        <br>-->
						<div class="inblock-string"><input type="radio" id="RB27" name="kind_cel" value="good"><label for="RB27">Кандидат позитивно известен жителям округа</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB28" name="kind_cel" value="bad"><label for="RB28">Кандидат известен жителям с негативных сторон</label></div><br>
						<div class="inblock-string"><input type="radio" id="RB29" name="kind_cel" value="so_so"><label for="RB29">Кандидат в разных ситуациях проявляет себя по-разному</label></div><br>
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