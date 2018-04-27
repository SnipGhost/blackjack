<html>
<head>
	<title><?=$meta['title']?></title>
	<link rel="stylesheet" type="text/css" href="/<?=BASE_URI?>css/style.css" />
</head>
<body>

	<div class="header panel">
		HEADER
		<span class="version"><?=VERSION?></span>
	</div>

	<div class="wrapper">
		<?php if ($contentFileName != '') include(ROOT."views/$contentFileName"); ?>
	</div>

	<div class="footer panel">
		FOOTER
	</div>

</body>
</html>