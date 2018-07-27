<form action="" method="POST">
	
	<div class = "reg-block">
		<div>
			<div class="line title">
				Изменение Email
			</div>
			<div class="line">
				<span class="orange"><?=$msg?></span>
			</div>
			<div class="line">
				<input type="email" name="new-email" placeholder="Новая электронная почта"  required/>
			</div>
			
			<div class="line">
				<input type="password" name="password" placeholder="Текущий пароль" required/>
			</div>
			<div class="line">
				<div class="g-recaptcha" data-sitekey="6LdMvGYUAAAAADE7J7B4IFRHXIKsRVQTbFUkv0Uk" style="transform:scale(0.79);-webkit-transform:scale(0.79);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
			</div>
		</div>
	</div>

    <div class="buttons">
        <a href="/<?=BASE_URI?>cab#profile" id="back-button-link">
            <div class="button-back">
                Назад
            </div>
        </a>
        <button type="submit" name="changeEmail" class = "button-enter">
            Изменить
        </button>
    </div>
</form>