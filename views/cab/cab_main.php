
<div class="content-box-cab">
	<div class="back">
		<!--Блок тарифов-->
		<div id="tarif" class="tabs block">
			<div class="content-cab-title">
				Личный кабинет
			</div><br>
			<div class="buttons noselect">
				<!--Кнопки (не получилось написать их вне блока)-->
				<a href="#profile" class="button-cab-tab">профиль</a>
				<a href="#kit" class="button-cab-tab">КИТ</a>
				<a href="#tarif" class="button-cab-tab darkstyle">тариф</a>
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
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="button-place">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="5VU7LXLHNACEQ">
							<input type="image" src="https://www.paypalobjects.com/ru_RU/RU/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal — более безопасный и легкий способ оплаты через Интернет!">
							<img alt="" border="0" src="https://www.paypalobjects.com/ru_RU/i/scr/pixel.gif" width="1" height="1">
						</form>
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
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="button-place">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="5VU7LXLHNACEQ">
							<input type="image" src="https://www.paypalobjects.com/ru_RU/RU/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal — более безопасный и легкий способ оплаты через Интернет!">
							<img alt="" border="0" src="https://www.paypalobjects.com/ru_RU/i/scr/pixel.gif" width="1" height="1">
						</form>
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
						<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="button-place">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="5VU7LXLHNACEQ">
							<input type="image" src="https://www.paypalobjects.com/ru_RU/RU/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal — более безопасный и легкий способ оплаты через Интернет!">
							<img alt="" border="0" src="https://www.paypalobjects.com/ru_RU/i/scr/pixel.gif" width="1" height="1">
						</form>
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
				<a href="#profile" class="button-cab-tab">профиль</a>
				<a href="#kit" class="button-cab-tab darkstyle">КИТ</a>
				<a href="#tarif" class="button-cab-tab">тариф</a>
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
						<a href="/<?=BASE_URI?>data/download.xls" class="button-kit noselect" download>скачать шаблон</a>
						<input type="hidden" name="MAX_FILE_SIZE" value="10000000" /> 
						<input name="file" type="file" class="file-kit"/>
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
						<div class="step">Шаг 4.</div> Обработка и просмотр результата.<br>
						<?php
						global $user;
						if(!is_null($user->file))
						{
							echo "Данные последнего загруженного файла:<br>";
							$data = readRes();
							if(!isset($ex)){
								$keys = array_keys($data);
								foreach($keys as $k)
								{
									$value = $data[$k];
									echo '<div class="progress-bar-wrap">';
									echo "<span class=\"progress-bar-text\">$k: </span>";
									echo '<div class="progress-bar">';
									if($value>=10)
										echo "<div class=\"progress-data\" style=\"width: $value%\">".round($value,2)."%</div></div><br>";
									else
										echo "<div class=\"progress-data\" style=\"width: 10%\">".round($value,2)."%</div></div><br>";
									echo '</div>';
//									echo "<div class = \"cand-block\"><div class = \"cand-left\">$k</div><div class=\"cand-right\">$data[$k]</div></div>";
								}
							}
							else
							{
								Echo "Что-то пошло не так:\n";
								Echo "$msg";
							}						
						}
						else
						{
							echo "<span style=\"color: black\">Здесь будут отображаться данные последнего вами загруженного файла</span>";		
						}
						?>
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
				<a href="#profile" class="button-cab-tab  darkstyle">профиль</a>
				<a href="#kit" class="button-cab-tab">КИТ</a>
				<a href="#tarif" class="button-cab-tab">тариф</a>
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