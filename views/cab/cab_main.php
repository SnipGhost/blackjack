<!--<div class="content-box-opi">
	<div class="content-box-title">
		Личный кабинет	
	</div>
	<div class="content-box-semititle">
		Email: test@mail.ru
		<button class="button-cab-black noselect">
			выйти
		</button>
	</div>
	<div class="kit-func">
		
		<form enctype="multipart/form-data" action="" method="POST">	
			<div class="content-box-title">
				КИТ
			</div>	
			<div style="margin-bottom: 10px">
				Красиво написанное предложение скачать форму заполнения КИТа
			</div>
			<div>
				<a href="/<?=BASE_URI?>data/download.xlsx" class="button-kit noselect" download>скачать шаблон</a>
				<input type="hidden" name="MAX_FILE_SIZE" value="30000" /> 
				<input name="kitfile" type="file" class="file-kit"/>
				<button type="submit" name="reg" class = "button-kit noselect">
					Отправить
				</button>
			</div>
			
		</form>	
	</div>	
	<a class="button-cab select">
		Сменить пароль
	</a>
	<div class="offers-wrap" style="color: #ffffff">
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
</div> -->
<div class="content-box-cab">
	<div class="back">
		<!--Блок тарифов-->
		<div id="tarif" class="tabs block">
			<div class="content-cab-title">
				Личный кабинет
			</div><br>
			<div class="buttons noselect">
				<!--Кнопки (не получилось написать их вне блока)-->
				<a href="#profile" class="button-cab-tab">профиль</a><a href="#kit" class="button-cab-tab">КИТ</a><a href="#tarif" class="button-cab-tab">тариф</a>
			</div>
			<div class="block-content-cab">
				<div class="offers-wrap" style="color: #ffffff">
					<div class="offer-cab">
						<div class="offer-title noselect">
							СТД
							<div class="offer-ttext">
								Стандартный<br><br>
							</div>
						</div>
						<hr>
						<div class="offer-content">
							Стандартный набор услуг. Включает в себя пакет функций КИТ.
						</div><br>
						<a href="/<?=BASE_URI?>opi" id="offer-button-link">
							<div class="offer-button noselect">
								Попробовать демо
							</div>
						</a>
					</div>
					<div class="offer-cab">
						<div class="offer-title noselect">
							ПРМ
							<div class="offer-ttext">
								Премиум<br><br>
							</div>
						</div>
						<hr>
						<div class="offer-content">
							Помимо функций КИТа включает в себя пакет репутационного менеджмента. В последствии будет дополняться
						</div>
						<a href="/<?=BASE_URI?>kit" id="offer-button-link">
							<div class="offer-button noselect">
								Купить
							</div>
						</a>						
					</div>
					<div class="offer-cab">
						<div class="offer-title noselect">
							VIP
							<div class="offer-ttext">
								Люкс<br><br>
							</div>
						</div>
						<hr>
						<div class="offer-content">
						В разработке
						</div>
						<a href="/<?=BASE_URI?>rem" id="offer-button-link">
							<div class="offer-button noselect">
								В разработке
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!--Блок кита-->
		<div id="kit" class="tabs block">
			<div class="content-cab-title">
				Личный кабинет
			</div><br>
			<div class="buttons noselect">
				<!--Кнопки (не получилось написать их вне блока)-->
				<a href="#profile" class="button-cab-tab">профиль</a><a href="#kit" class="button-cab-tab">КИТ</a><a href="#tarif" class="button-cab-tab">тариф</a>
			</div>
			<div class="block-content-cab">
				<form enctype="multipart/form-data" action="/<?=BASE_URI?>upload" method="POST">	
					<div class="content-box-title">
						Комплекс избирательных технологий
					</div>	
					<div style="margin-bottom: 10px">
                        Разработанный нами Комплекс Избирательных Технологий (КИТ) позволяет Вам планировать и следить как за собственными результатами агитационных мероприятий, так и за результаты конкурентов.  С помощью предоставляемого инструмента Вы (или ваш избирательный штаб) сможете адекватно, основываясь на подсчетах, оценить текущую ситуацию и ответить на вопрос: «Что будет, если выборы состоятся завтра?». 
                        Примечание: мы не являемся частью избирательного штаба. Мы предоставляем аналитическую поддержку в виде инструмента планирования и мониторинга избирательной кампании.
					</div>
                    <br>
                    <div class="decorative-strip"></div>
                    <br>
                    <div class="content-box-name">
						Загрузить и анализировать файл:
					</div>
					<div>
						<a href="/<?=BASE_URI?>data/download.xlsx" class="button-kit noselect" download>скачать шаблон</a>
						<input type="hidden" name="MAX_FILE_SIZE" value="30000" /> 
						<input name="kitfile" type="file" class="file-kit"/>
						<button type="submit" name="reg" class = "button-kit noselect">
							Отправить
						</button>
					</div>
                    <br>
                    <div class="decorative-strip"></div>
                    <br>
                    <div class="content-box-name">
						Инструкция по заполнению шаблона
					</div>
                    <div style="margin-bottom: 10px">
                        <div class="step">Шаг 1.</div> Скачайте и откройте файл шаблона, который можно скачать выше. Как только Вы зарегистрируетесь, Вам будет открыт доступ для скачивания исходного файла формата «.xls». Вы сможете открыть этот файл, используя программу Microsoft Excel.
                        </div>
                    <div style="margin-bottom: 10px">
    				    <div class="step">Шаг 2.</div> Ознакомьтесь с содержимым файла. В зависимости от выбранного тарифа Вам будут предоставлены разные файлы. В тарифном плане «Демонстрационный вариант» предоставляется файл следующего вида:
					</div>
					<img class="image" src="img/guide/1_1.png"/>
                    <div style="margin-bottom: 20px">
                        Лист «Исходные параметры» предназначен для сбора общей информации об избирательном округе и кандидатах.
                    </div>
                    <img class="image" src="img/guide/2_1.png"/>
                    <div style="margin-bottom: 20px">
                        Обращаем Ваше внимание на то, что каждому рабочему дню избирательной кампании соответствует свой лист для заполнения данными об агитационных мероприятиях.
                    </div>
                    <img class="image" src="img/guide/3_1.png"/>
                    <div style="margin-bottom: 10px">
                        <div class="step">Шаг 3.</div> Заполните файла данными. Начать следует с листа «Исходные параметры». Обращаем Ваше внимание, что имена кандидатов могут не соответствовать действительности.
                        </div>
                    <img class="image" src="img/guide/4.png"/>
                    <div style="margin-bottom: 10px">
				        <div class="step">Шаг 4.</div> Обработка и просмотр результата.
					</div>
				</form>	
			</div>
		</div>
		<!--Блок профиля-->
		<div id="profile" class="tabs block">
			<div class="content-cab-title">
				Личный кабинет
			</div><br>
			<div class="buttons noselect">
				<!--Кнопки (не получилось написать их вне блока)-->
				<a href="#profile" class="button-cab-tab">профиль</a><a href="#kit" class="button-cab-tab">КИТ</a><a href="#tarif" class="button-cab-tab">тариф</a>
			</div>
			<div class="block-content-cab">
				<div class="line">
                    <?php global $user; ?>
					Email: <?=$user->email?>   
				</div>	<br>	
				<div class="line">
					<a href="/<?=BASE_URI?>cab/chgemail" class="button-cab noselect">
						Сменить email
					</a>
					<a href="/<?=BASE_URI?>cab/chgpass" class="button-cab noselect" style="margin-left: 20px">
						Сменить пароль
					</a>  
				</div>
				<!--<form action="" method="POST">
					<button  class="button-cab-black noselect" style="margin-top: 100px; width: 100px;" name="logout">
							выйти
					</button>
				</form>-->
				</div>
			</div>
		</div>
	</div>
	<div id="tab" class="block">
	</div>
</div>