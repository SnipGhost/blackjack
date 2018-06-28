<!-- Содержимое страницы ОПИ -->
<div class="content-box-opi">
	<div class="content-box-title">
		Определение потенциала избираемости	
	</div>
<!--
	<div class="content-box-semititle">
			Определение потенциала избираемости
	</div>	
-->
	<div class="small-description">
        <br>
        Когда-нибудь хотел стать депутатом или известным политиком? Узнай свой потенциал избираемости! Интересно? Ответь на следующие вопросы сначала о себе, а потом о твоих конкурентах и узнай результат!
	</div>
</div>
<div class="content-box-opi">
	<div class="content-box-semititle">
		ФОРМА ДЛЯ ОПРЕДЕЛЕНИЯ ПОТЕНЦИАЛА
	</div>
	<div>
		(необходимо заполнить и нажать кнопку "Анализ")
	</div>
	<?php
	if($num_kand=='2') require ROOT."data/out-2.html";
	elseif($num_kand=='3') require ROOT."data/out-3.html";
	elseif($num_kand=='4') require ROOT."data/out-4.html";
	elseif($num_kand=='5') require ROOT."data/out-5.html";
	elseif($num_kand=='6') require ROOT."data/out-6.html";
	elseif($num_kand=='7') require ROOT."data/out-7.html";
	?>
	<!--<?php require ROOT."data/out.html"; ?>-->
</div>