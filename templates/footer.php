<footer class="page-footer">
	<div class="footer-box">
		<?php if($page != "auth"): ?>
			<?php if($_SESSION['auth'] != true): ?>
			<a class="login-btn sprite" href="/auth">
				<span class="hidden">Войти</span>
			</a>
			<?php else: ?>
			<a class="unlock-btn" href="/logout">
				<span class="hidden">Выйти</span>
			</a>
			<?php endif; ?>
		<?php endif; ?>
		<p class="footer-inf">&copy; 2015 Эмма Хайруллина</p>
	</div>
</footer>
<script src="../bower/jquery/dist/jquery.min.js"></script>

<?php if($page == "portfolio"): ?>
	<script src="../bower/jquery-placeholder/jquery.placeholder.min.js"></script>
	<script src="../js/tooltips.js"></script>
	<script src="../bower/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
	<script src="../bower/blueimp-file-upload/js/jquery.iframe-transport.js"></script>
	<script src="../bower/blueimp-file-upload/js/jquery.fileupload.js"></script>
	<script src="../js/file-upload.js"></script>
<?php endif; ?>

<?php if($page == "contacts"): ?>
	<script src="../bower/jquery-placeholder/jquery.placeholder.min.js"></script>
	<script src="../js/tooltips.js"></script>
<?php endif; ?>

<?php if($page == "auth"): ?>
	<script src="../bower/jquery-placeholder/jquery.placeholder.min.js"></script>
	<script src="../js/tooltips.js"></script>
<?php endif; ?>
<script src="../js/main.js"></script>