<form action="" method="POST">
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
								<input type="password" name="retype"placeholder="Повторите пароль" required/>
							</div>
                            
<!--
                            <a href="/<?=BASE_URI?>opi" id="offer-button-link">
                                <div class="offer-button noselect">
                                    Попробовать
                                </div>
                            </a>
-->
                            
						</div>
					</div>
					<div class="buttons">
						<a href="/<?=BASE_URI?>" id="back-button-link">
							<div class="button-back">
								Назад
							</div>
						</a>
                        <button type="submit" name="reg" class = "button-reg">
                            Регистрация
                        </button>
					</div>
</form>