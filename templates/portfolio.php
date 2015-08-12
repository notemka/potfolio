<h2 class = "over-block-title">Мои работы</h2>
<ul class="projects-list"><li class="project-item">
		<a href="" class="project-link">
			<img class = "site-img" src="../img/first.png" alt="">
			<div class="animate-block">
			</div>
			<h3 class="animate-block-name">Сайт портфолио</h3>
		</a>
		<a href="http://emmahr.ru" class="site-name">emmahr.ru</a>
		<div class="project-inf">
			Первый пробный проект: сайт-портфолио
		</div>
	</li>
	<li class="project-item">
		<a href="" class="project-link">
			<img class = "site-img" src="../img/second.png" alt="">
			<div class="animate-block">
			</div>
			<h3 class="animate-block-name">ЭплShop</h3>
		</a>
		<a href="http://shop.emmahr.ru" class="site-name">shop.emmahr.ru</a>
		<div class="project-inf">
			Второй пробный проект: Интернет-магазин
		</div>
	</li>
	<li class="project-item">
		<a href="" class="project-link">
			<img class = "site-img" src="../img/third.png" alt="">
			<div class="animate-block">
			</div>
			<h3 class="animate-block-name">WMGenerator</h3>
		</a>
		<a href="http://nvo87.ru/wm-generator/" class="site-name">nvo87.ru/wm-generator</a>
		<div class="project-inf">
			Первая командная работа
		</div>
	</li>
	<?php foreach($projects as $project): ?>
	<li class="project-item">
		<a href="<?php echo $project['link']; ?>" class="project-link">
			<img class = "site-img" src="img/<?php echo $project['thumb']; ?>" alt="<?php echo $project['link']; ?>">
			<div class="animate-block">
			</div>
			<h3 class="animate-block-name"><?php echo $project['title']; ?></h3>
		</a>
		<a href="<?php echo $project['link']; ?>" class="site-name"><?php echo $project['title']; ?></a>
		<div class="project-inf">
			<?php echo $project['description']; ?>
		</div>
		<?php endforeach; ?>
<!--	--><?php //if(isset($_SESSION['auth']) && $_SESSION['auth'] == true): ?>
	<li class="project-item add-project-item">
		<a href="#" class="add-project-link" id="open-popup-btn">
			<span>Добавить проект</span>
		</a>
	</li>
<!--	--><?php //endif; ?>
</ul>
<div class="popup-modal-win" id="popup">
	<div class="overlay" id="popup-overlay"></div>
	<div class="modal-window" id="popup-win">
		<div class="add-form-title-block clearfix">
			<h2 class="add-form-title">Добавление проекта</h2>
			<a href="" class="close-modalwin" id="close-popup">x</a>
		</div>
		<form method="" action="mailto:emma.saitgaraeva@gmail.com" class="field-wrapper" id="form">
			<div class="error-alert">
				<div class="error-alert-box" id="error-popup">
					<span class="error-text">Ошибка!</span>
					<a href="" class="close-error-alert">x</a>
					<div class="error-inf">Невозможно добавить проект.</div>
				</div>
			</div>
			<label for="input-name" class="label-for-input">Название проекта</label>
			<input type="text" name = "name" id="input-name" class="project-name-field" data-validation="project-name" placeholder="Введите название">
			<label for="fileupload" class="label-for-input file-label">
				<span class="file-btn-name">
					Картинка проекта
				</span>
				<input class="fake-file-field" id="fileurl" name="fileurl" placeholder="Загрузите изображение"  value="">
				<input type="file" name = "file[]" id="fileupload" class="project-img-field" data-validation="file">
			</label>

			<label for="input-url" class="label-for-input">URL проекта</label>
			<input type="text" name = "url" id="input-url" class="project-url-field" data-validation="project-url" placeholder="Добавьте ссылку">
			<label for="input-description" class="label-for-input">Описание</label>
			<textarea name="description" id="input-description" class="project-description-field" data-validation="project-description" placeholder="Пара слов о вашем проекте"></textarea>
			<input type="submit" class="add-project-btn" id="add-submit" value="Добавить">
		</form>
	</div>
	<div class="success-alert" id="success-popup">
		<div class="success-alert-box">
			<span class="success-text">УРА!</span>
			<a href="" class="close-alert">x</a>
			<div class="success-inf">Проект успешно добавлен.</div>
		</div>
	</div>
</div>