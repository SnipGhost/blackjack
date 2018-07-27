<form action="" method="POST">
	
	<div class = "reg-block">
		<div>
			<div class="line title">
				Восстановление пароля
			</div>
			<div class="line">
				<span class="orange"><?=$msg?></span>
			</div>
			<div class="line">
				<input type="text" name="email" placeholder="Email"  required/>
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
        <button type="submit" name="Reestablish" class = "button-enter">
            Восстановить
        </button>
    </div>
</form>