<form action="" method="POST" >
	
	<div class = "reg-block">
		<div>
			<div class="line title">
				Регистрация
				<div class = "semititle">
					Создание нового пользователя
				</div>
			</div>
			<div class="line">
				<span class="orange"><?=$msg?></span>
			</div>
			<div class="line">
				<input type="email" name="email" placeholder="Электронная почта"  required/>
			</div>
			
			<div class="line">
				<input type="password" name="password" placeholder="Пароль" required/>
			</div>

			<div class="line">
				<input type="password" name="retype" placeholder="Повторите пароль" required/>
			</div>
			<div class="line">
				<div class="g-recaptcha" data-sitekey="6LdMvGYUAAAAADE7J7B4IFRHXIKsRVQTbFUkv0Uk" style="transform:scale(0.79);-webkit-transform:scale(0.79);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
			</div>
		</div>
	</div>

    <div class="buttons">
        <a href="/<?=BASE_URI?>" id="back-button-link">
            <div class="button-back">
                Назад
            </div>
        </a>
        <button type="submit" name="reg" class = "button-enter">
            Регистрация
        </button>
    </div>
</form>