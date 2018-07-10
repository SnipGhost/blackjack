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
							Доброе имя – Ваш инструмент. Вот почему грамотный репутационный менеджмент необходим как персонам, так и организациям. В отличие от традиционного подхода, когда Вы пользуетесь услугами PR-специалистов и получаете размытые формулировки без каких-либо числовых подтверждений, мы предлагаем программный комплекс, помогающий Вам просчитывать  и отслеживать результаты работы по формированию репутации. 
                            <br>
                            <br>
                            Помните, что РЕПУТАЦИЯ это, прежде всего:
                            <br>
                            <ul>
                                <li>	Реальная ценность </li>
                                <li>	Доверие партнеров </li>
                                <li>	Самоуважение </li>
                                <li>	Престиж </li>
                                <li>	Финансовая стабильность </li>
                            </ul>


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
						НИР - Агентство  - команда, обладающая современными авторскими технологиями формирования репутации организаций и отдельных персон, реализации политических проектов. 
                            <br>
                            <br>
                        Наши преимущества: 
                            <br>
                            <ul>
                                <li>	Доступность: использование наших технологий не требует специальной подготовки. </li>
                                <li>	Безопасность: система не требует персональных данных, Ваша анонимность – залог нашей работы. </li>
                                <li>	Информированность: при работе с нашими технологиями Вы имеете необходимый объем информации для принятия репутационных решений. </li>
                                <li>	PR-сопровождение малых предприятий. </li>
                            </ul>

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
                        <a href="/<?=BASE_URI?>cab#kit" id="offer-button-link">
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


