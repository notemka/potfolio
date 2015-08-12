<!doctype html>
<html lang="ru-RU">
<?php require_once 'head.php'; ?>
<body>
<?php require_once 'header.php' ?>
<div class="wrapper clearfix">
	<div class="page-container clearfix">
		<?php require_once 'navbar.php' ?>
		<div class="page-content <?php if($page == "portfolio" || $page == "contacts") echo "over-content"; ?>">
			<?php require_once $page.'.php' ?>
		</div>
	</div>
</div>
<?php require_once 'footer.php' ?>
</body>
</html>