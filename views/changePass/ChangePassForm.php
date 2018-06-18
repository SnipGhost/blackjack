<form action="" method="POST">
	
	<div class = "reg-block">
		<div>
			<div class="line title">
				Изменение пароля
			</div>
			<div class="line">
				<span class="orange"><?=$msg?></span>
			</div>
			<div class="line">
				<input type="password" name="old-pass" placeholder="Старый пароль"  required/>
			</div>
			
			<div class="line">
				<input type="password" name="new-pass" placeholder="Новый пароль" required/>
			</div>

			<div class="line">
				<input type="password" name="repeat-new-pass" placeholder="Повторите новый пароль" required/>
			</div>
		</div>
	</div>

    <div class="buttons">
        <a href="/<?=BASE_URI?>" id="back-button-link">
            <div class="button-back">
                Назад
            </div>
        </a>
        <button type="submit" name="changePass" class = "button-enter">
            Изменить
        </button>
    </div>
</form>