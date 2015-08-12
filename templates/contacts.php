<div class="form-contacts-title">
	У вас интересный проект? Напишите мне
</div>
<form action="POST" class="contacts-form" id = "form">
	<ul class="form-list">
		<li class="alert-box" id="alert-success-item">
			<div class="success-alert-box" id="mail-success-alert">
				<a href="" class="close-success-alert">x</a>
				<div class="success-inf">Письмо успешно отправлено.</div>
			</div>
		</li>
		<li class="alert-box" id="alert-error-item">
			<div class="error-alert-box" id="mail-error-alert">
				<a href="" class="close-error-alert">x</a>
				<div class="error-inf">Произошла ошибка, повторите попытку.</div>
			</div>
		</li>
		<li class="form-item">
			<div class="name-box clearfix">
				<label for="name" class="label-for-input">Имя</label>
				<input type="text" name="name" class="name-field" data-validation = "name" placeholder="Как к вам обращаться">
			</div>
			<div class="email-box">
				<label for="email" class="label-for-input">Email</label>
				<input type="email" name="email" class="email-field" data-validation = "email" placeholder="Куда мне писать">
			</div>
		</li>
		<li class="form-item">
			<label for="message" class="label-for-input">Сообщение</label>
			<textarea name="message" id="" class="message-field" data-validation = "msg" placeholder="Кратко в чем суть"></textarea>
		</li>
		<li class="form-item">
			<!-- <label for="capcha-block" class="label-for-input">Введите код, указанный на картинке</label>
			<div class="capcha" id="capcha-block"> -->
			<label for="capcha-block" class="label-for-input">Проверка на робота
			</label>
			<div class="g-recaptcha" id="capcha-block" data-sitekey="<?php echo PUBLIC_KEY; ?>"></div>
			<!-- </div>
			<input type="text" class="img-code" placeholder="Введите код"> -->
		</li>
		<li class="form-item">
			<input type="submit" class="send-btn" value="Отправить">
			<input type="reset" class="clear-btn"  value="Очистить">
		</li>
	</ul>
</form>