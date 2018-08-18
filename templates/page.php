<html>
<head>
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/icons.css" />
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/main.css" />
	<?php
		if (isset($scripts)) {
			foreach ($scripts as $script) {
				printf('<script type="text/javascript" src="%s"></script>', '/'.BASE_URI.$script);
			}
		}
	?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>	
<body>
	<div class="header">
		<div class="header-content">
			<?php require 'templates/login.php'; ?>
		</div>
	</div>

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
			<?php if ($content != '') { include ROOT."views/$content"; } ?>
		</div>
	</div>

	<?php require_once ROOT."templates/footer.php"; ?>

</body>
</html>