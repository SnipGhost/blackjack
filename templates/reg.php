<html>
<head>
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/main.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>

	<div class="wrapper">
		<div class="allin-block">
			<a href="/<?=BASE_URI?>" id="logo">
				<div></div>
				<span>Лого</span>
			</a>
			<div class="reg-form inline-flex">
				<div class="reg-title-block noselect">
					<div class="title-startup">START</div><div class="title-startup orange">UP</div>
					<div class="title-main">ANALYTICS</div>
					<div class="title-name">
						<div>Научно-инженерное<br>репутационное агентство</div>
					</div>
				</div>
				<?php if ($content != '') { include ROOT."views$content"; } ?>
			</div>
		</div>
	</div>

	<?php require_once ROOT."templates/footer.php"; ?>	
</body>
</html>