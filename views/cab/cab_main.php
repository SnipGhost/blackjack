<div class="content-box-opi">
	<div class="content-box-title">
		Личный кабинет	
	</div>
	<div class="content-box-semititle">
		Email: test@mail.ru
	</div>	
	<br>
	<br>
	<hr>
	<br>
	<div class="buttons">
		<a class="button-cab">
			Сменить email
		</a>
		<a class="button-cab">
			Сменить пароль
		</a>
	</div>
	<br>
	<hr>
	<div class="kit-func">
		<form enctype="multipart/form-data" action="" method="POST">		
			<div style="margin-bottom: 15px">
				Красиво написанное предложение скачать форму заполнения КИТа
			</div>
			<div>
				<a href="/<?=BASE_URI?>data/download.xlsx" class="button-kit noselect" download>скачать</a>
			</div>
			<div style="margin-top: 15px">
				Красиво написанное предложение загрузить заполненную форму КИТа
			</div>
			<!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла  -->
			<input type="hidden" name="MAX_FILE_SIZE" value="30000" /> 
			<!-- Название элемента input определяет имя в массиве $_FILES -->
			<input name="kitfile" type="file" class="file-kit"/><br>
			<button type="submit" name="reg" class = "button-kit noselect">
				Отправить
			</button>
		</form>	
	</div>
	<br>
	<hr>
	<div class="content-box-semititle">
		Форма смены тарифа (скорее всего, аналогичная ОПИ КИТ РЕМ на главной)
	</div>
</div>