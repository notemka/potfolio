(function () {
	var app = {

		// ИНИЦИАЛИЗАЦИЯ 

		init: function (){
			this.setUpListeners();
			//this.fileUpLoad();
		},

		// ЗАПУСК  СОБЫТИЙ
		 
		setUpListeners: function (){
			$('#open-popup-btn').on('click', this.popupOpen);
			$('#popup-overlay').on('click', this.popupClose);
			$('#close-popup').on('click', this.popupBtnClose);
			$('.contacts-form').on('submit', this.sendMail);
			$('.close-success-alert').on('click', this.alertClose);
			$('.close-error-alert').on('click', this.alertClose);
			//$('#fileupload').on('click', this.fileUpLoad)
		},

		// МОДАЛЬНОЕ ОКНО
		
		// открытие окна по клику на ссылку "Добавить"
		popupOpen: function (e){
				e.preventDefault();

				var popup = $('#popup'),
					popupWin = $('#popup-win'),
					animateDuration = 300;

				popup.fadeIn(animateDuration);
				popupWin.css('top', ($(window).height() - popupWin.height()) / 2 + "px");
				popupWin.css('left', ($(window).width() - popupWin.width()) / 2 + "px");
		},

		// закрытие окна по клику на подложку
		popupClose: function (e){
				e.preventDefault();

				var $this = $(this),
					popup = $this.closest('#popup'),
					animateDuration = 300;

				popup.fadeOut(animateDuration);
		},

		// закрытие окна по клику на кнопку закрытия
		popupBtnClose: function (e){
			e.preventDefault();

			var $this = $(this),
				popup = $this.closest('#popup'),
				animateDuration = 300;

			popup.fadeOut(animateDuration);
		},
		
		// загрузка изображения
		fileUpLoad: function(){
			$('#fileupload').fileupload({
				//url: './php/upload.php',
				dataType: 'json',
				success: function(data){
					$('#fileurl').val(data.name);
					console.log(data.name);
				}
			});
		},

		//	отправка письма
		sendMail: function(e){
			e.preventDefault();

			var form = $(this),
				formData = form.serialize(),
				dataType = 'json',
				url = './php/mail_send.php';

			if(validateThis(form) === true){
				$.ajax({
					url: url,
					data: formData,
					dataType: dataType,
					type: 'POST'
				})
				.done(function(data){
					console.log(data);

					app.successMessage(form);
					form.trigger('reset');
				})
				.fail(function(data){
					app.errorMessage(form);
				})
			}
		},

		// сообщение при успешной отправке письма
		successMessage: function(form){
			var alertSuccess = $('#alert-success-item'),
				successEmailMes = $('#mail-success-alert');

			alertSuccess.show();
			successEmailMes.fadeIn();
		},

		// сообщение об ошибке при отправке письма
		errorMessage: function(form){
			var alertError = $('#alert-error-item'),
				errorEmailMes = $('#mail-error-alert');

			alertError.show();
			errorEmailMes.fadeIn();
		},

		// кнопка закрытия всплывающих сообщений
		alertClose: function(e){
			e.preventDefault();

			var alert = $('.alert-box');

			alert.hide();
		}
	};
	app.init();
	//$("input['placeholder']", "textarea['placeholder']").placeholder();
}());
