$('input[placeholder], textarea[placeholder]').placeholder();

(function () {
	var app = {

		// ИНИЦИАЛИЗАЦИЯ 

		init: function (){
			this.setUpListeners();
			this.fileUpLoad();
		},

		// ЗАПУСК  СОБЫТИЙ
		 
		setUpListeners: function (){
			$('#open-popup-btn').on('click', this.popupOpen);
			$('#popup-overlay').on('click', this.popupClose);
			$('#close-popup').on('click', this.popupBtnClose);
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
			$('fileupload').fileupload({
				url: '../upload.php',
				dataType: 'json',
				success: function(data){
					$('#fileurl, #filename').val(data.name);
				}
			})
		}
	};
	app.init();
}());
