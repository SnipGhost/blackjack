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
						КИТ
					</div>	
					<div style="margin-bottom: 10px">
						Красиво написанное предложение скачать форму заполнения КИТа
					</div>
					<div>
						<a href="/<?=BASE_URI?>data/download.csv" class="button-kit noselect" download>скачать шаблон</a>
						<input type="hidden" name="MAX_FILE_SIZE" value="30000" /> 
						<input name="file" type="file" class="file-kit"/>
						<button type="submit" name="reg" class = "button-kit noselect">
							Отправить
						</button>
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