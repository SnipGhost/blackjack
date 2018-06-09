<html>
<head>
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/style.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>

	<div class="header panel">
		<span class="panel-text">Project blackjack</span>
		<?php include 'templates/login.php'; ?>
	</div>

	<div class="wrapper">
		<?php if ($content != '') { include ROOT."views/$content"; } ?>
	</div>

	<div class="footer panel">
		<span class="panel-text"><?=VERSION?></span>
	</div>
	
</body>
</html>