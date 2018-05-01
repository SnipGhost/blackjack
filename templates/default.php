<html>
<head>
	<title><?=$title?></title>
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/style.css" />
</head>
<body>

	<div class="header panel">
		Header
		<span class="version"><?=VERSION?></span>
	</div>

	<div class="wrapper">
		<?php if ($content != '') include(ROOT."views/$content"); ?>
	</div>

	<div class="footer panel">
		Footer
	</div>

</body>
</html>