<?php

	$errcode = 200;

	if (isset($_GET['code']))
		$errcode = $_GET['code'];

	$errorCodes = include('responses.php');

	if (!isset($e)) {
		$code = $errcode;
		$name = $errorCodes[$code];
		$message = "Server error";
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
	<style>
		* {
			margin: 0;
			padding: 0;
		}
		body {
			align: center;
			padding: 200px 50px 50px 50px;
			background: #2f4e81;
			color: white;
			font-family: Courier New;
		}
		body a {
			color: white;
		}
	</style>
	<script type="text/javascript">
		function handler(event) {
			switch(event.keyCode) {
				default:
					history.back();
				}	
		}
		window.addEventListener('keydown', handler, false);
	</script>
 </head>	
 <body>
	<center>
 	<h1>Kernel panic!</h1>
 	<br><br>
 	Произошла ошибка. Для продолжения: <br>
 	Нажмите любую клавишу, чтобы вернуться назад, или тыкните 
	<a href="javascript:history.back();">ЗДЕСЬ</a><br>
 	Зажмите CTRL+ALT+DEL и перезагрузите ваш компьютер, но это точно не поможет. <br>
 	<br><br>
	<b>Код ошибки: <?=$code?></b><br>
 	<b>Расшифровка: <?=$name?></b><br>
	<?php if (DEBUG) echo '<br>'.$message.'<br>'; ?>
	<br><br>
 	<b>Press ANY key to continue</b>
	</center>
 </body>
</html>