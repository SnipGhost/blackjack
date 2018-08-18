<?php

    $errcode = 200;

    if (isset($_GET['code'])) {
        $errcode = $_GET['code'];
    }

    $errorCodes = include 'responses.php';

    if (!isset($e)) {
        $code = $errcode;
        $name = $errorCodes[$code];
        $message = 'Server error';
    } else {
        $code = $e->getCode();
        $name = $errorCodes[$code];
        $message = $e->getMessage();
    }

    header('HTTP/1.0 '.$code.' '.$name);

?>
<html>
 <head>
  <title>Ошибка</title>	
  	<meta http-equiv="Content-Language" content="ru">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- <script type="text/javascript">
		function handler(event) {
			switch(event.keyCode) {
				default:
					history.back();
				}	
		}
		window.addEventListener('keydown', handler, false);
	</script> -->
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/main.css" />
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/icons.css" />
 </head>	
 <body>
 	<div class="wrapper">
		<div class="opi-allin-block">
			<!-- Надо продумать так, чтобы у нас эта часть была недублируема -->
			<!-- Дублер в templates/template.php -->
			<a href="/<?=BASE_URI?>" id="logo">
				<div></div>
			</a>
		</div>
		<!-- Тут явно баг в логике названий. Почему about? -->
		<div id="block-about">
			<div class="content-box">
				<div class="content-box-title">Ошибка</div>
				<div class="ab-text">
					<p>
						Извините, по техническим причинам на данный момент сайт не работает :(
					</p>
					<p>
						Мы уже решаем данную проблему. Если вам требуется срочная помошь, пожалуйста, обратитесь в нашу службу технической поддержки по следующим контактам:<br>
						Электронная почта: <?=TEX_PODD_EMAIL?><br>
						Телефон: <?=TEX_PODD_PHONE?><br>
						Мы постараемся Вам помочь
					</p>
				</div>
			</div>
		</div>
	</div>

	<?php require_once ROOT."templates/footer.php"; ?>
 </body>
</html>