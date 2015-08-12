$(document).ready(function() {

    // событие нажатия на кнопку
    $('#form').on('submit', function(e){
        e.preventDefault();

        var $this = $(this);
        validateThis($this);

        // if(validateThis($this)) {
        //     postFormData($this, function(data){
        //         // if (data.status){
        //         //     console.log('все ок');
        //         //     //появление попапа success
        //         // } else{
        //         //     console.log('что топошло не так');
        //         //     //появление попапа error
        //         // }
        //         // regPopup = data.status ?
        //     });
        // }
    });
});  // --> ready end

    //
    
// function postFormData(form, successCallback){
//     var
//         host        = form.attr('action'),
//         regFields   = form.find('[name]'),
//         dataObject  = {};

//     if(!host) {
//         console.log('установи атрибут экшн для своей формы!');
//     }

//     regFields.each(function(){
//         var
//             $this = $(this),
//             value = $this.val(),
//             name = $this.attr('name');

//         dataObject[name] = value;
//     });

//     $.post(host, dataObject, successCallback);
// };

    // ВАЛИДАЦИЯ 
    
   function validateThis(form){
    var
        projectName = form.find("[data-validation='project-name']"),
        file = form.find("[data-validation='file']"),
        projectUrl = form.find("[data-validation='project-url']"),
        projectDescription = form.find("[data-validation='project-description']"),
        nameContact = form.find("[data-validation='name']"),
        emailContact = form.find("[data-validation='email']"),
        msg = form.find("[data-validation='msg']"),
        authName = form.find("[data-validation='user-name']"),
        authEmail = form.find("[data-validation='user-email']"),
        isValid = false;    // прошла валидацию форма или нет

    projectName.each(function(){
        var 
            $this = $(this),
            notEmptyField = !!$this.val();

        if(notEmptyField){
            isValid = true;     // если не пустое
        } else {
            isValid = false;
            $this.tooltips({
                content : 'Введите название проекта',
                position : 'left'
            });
            $this.addClass('error-field');
            isValid = false;
        }    
    });

    file.each(function(){
        var 
            $this = $(this),
            fakeImgField = $('#fake-field'),
            notEmptyField = !!$this.val();

        if(notEmptyField){
            isValid = true;     // если не пустое
        } else {
            $this.tooltips({
                content : 'Введите картинку проекта',
                position : 'left'
            });
            fakeImgField.addClass('error-field');
            isValid = false;
        }    
    });

    projectUrl.each(function(){
        var 
            $this = $(this),
            notEmptyField = !!$this.val();

        if(notEmptyField){
            isValid = true;     // если не пустое
        } else {
            $this.tooltips({
                content : 'Введите URL проекта',
                position : 'left'
            });
            $this.addClass('error-field');
            isValid = false;
        }    
    });
    projectDescription.each(function(){
        var 
            $this = $(this),
            notEmptyField = !!$this.val();

        if(notEmptyField){
            isValid = true;     // если не пустое
        } else {
            $this.tooltips({
                content : 'Введите описание проекта',
                position : 'left'
            });
            $this.addClass('error-field');
            isValid = false;
        }    
    });
    nameContact.each(function(){
        var 
            $this = $(this),
            notEmptyField = !!$this.val();

        if(notEmptyField){
            isValid = true;     // если не пустое
        } else {
            $this.tooltips({
                content : 'Введите имя',
                position : 'left'
            });
            $this.addClass('error-field');
            isValid = false;
        }    
    });
    emailContact.each(function(){
        var 
            $this = $(this),
            notEmptyField = !!$this.val();

        if(notEmptyField){
            isValid = true;     // если не пустое
        } else {
            $this.tooltips({
                content : 'Введите email',
                position : 'right'
            });
            $this.addClass('error-field');
            isValid = false;
        }    
    });
    msg.each(function(){
        var 
            $this = $(this),
            notEmptyField = !!$this.val();

        if(notEmptyField){
            isValid = true;     // если не пустое
        } else {
            $this.tooltips({
                content : 'В чем суть',
                position : 'left'
            });
            $this.addClass('error-field');
            isValid = false;
        }    
    });
    authName.each(function(){
        var 
            $this = $(this),
            notEmptyField = !!$this.val();

        if(notEmptyField){
            isValid = true;     // если не пустое
        } else {
            $this.tooltips({
                content : 'Введите ваше имя',
                position : 'left'
            });
            $this.addClass('error-field');
            isValid = false;
        }    
    });
    authEmail.each(function(){
        var 
            $this = $(this),
            notEmptyField = !!$this.val();

        if(notEmptyField){
            isValid = true;     // если не пустое
        } else {
            $this.tooltips({
                content : 'Введите ваш email',
                position : 'left'
            });
            $this.addClass('error-field');
            isValid = false;
        }    
    });

};

$.fn.tooltips = function (options) {
    // дефолтные значения (если значения не заданы в функции)
    options = {
        position    : options.position || 'right',
        content     : options.content || 'I am tooltip'         
    };

    var
        // в блок вставляется позиция тултипа и контент
        markup = '<div class="tooltip tooltip-' + options.position + '"> \
           <div class="tooltip-inner">' + options.content + '</div> \
       </div>';

    var
        $this = this,   // элемент, к которому применяем плагин
        body = $('body');

    $this
        .addClass('tooltipstered')      // элемент, к которому уже добавили тултип
        .attr('data-tooltip-position', options.position);  // для того чтобы знать с какой сторон был тултип, чтобы пересчитывать

    // добавляем в конец документа тултип
    body.append(markup);

    // вызов главной ф-ии находим последний добавленный тултип по общему классу
    _positionIt($this, body.find('.tooltip').last(), options.position); 
 

    // пропадание тултипов при клике в любое место
    $(document).on('click', function(){
        var $this = $(this),
            errorInputs = $this.find('.error-field');

        $('.tooltip').remove();
        errorInputs.removeClass('error-field');
    });

    // изменение положения тултипа по рисайзу окна браузера
    $(window).on('resize', function(){
        var 
            tooltipsArray = [];     // массив из всех созданных тултипов

        $('.tooltip').each(function(){
            tooltipsArray.push($(this));
        });

        $('.tooltipstered').each(function(index){
            var 
                position = $(this).data('tooltip-position');
            _positionIt($(this), tooltipsArray[index], position);
        });
    });

    // центрирование тултипов
    function _positionIt(elem, tooltip, position) {
        
        // измеряем элемент
        
        var
            elemWidth   = elem.outerWidth(true),
            elemHeight  = elem.outerHeight(true),
            // верхний край элемента
            topEdge     = elem.offset().top,
            // нижний край = верхний край + высота элемента
            bottomEdge  = topEdge + elemHeight,
            leftEdge    = elem.offset().left,
            // правый край = левый край + ширина элемента
            rightEdge   = leftEdge + elemWidth;

        // измеряем тултип
        
        var 
            tooltipWidth    = tooltip.outerWidth(true),
            tooltipHeight   = tooltip.outerHeight(true),
            leftCenter      = (elemWidth / 2) - (tooltipWidth / 2),
            topCenter       = (elemHeight / 2) -(tooltipHeight / 2);

        var positions = {};

        switch (position) {
            // тултип справа от элемента, посередине
            case 'right' : 
                positions = {
                left : rightEdge,
                top : topEdge + topCenter
            };
            break;
            // тултип слева от элемента, посередине
            case 'left' : 
                positions = {
                left : leftEdge - tooltipWidth,
                top: topEdge + topCenter
            };
            break;
            // тултип сверху от элемента, посередине
            case 'top' : 
                positions = {
                left : leftEdge + leftCenter,
                top : topEdge - tooltipHeight
            };
            break;
            // тултип снизу от элемента, посередине
            case 'bottom' : 
                positions = {
                left : leftEdge + leftCenter,
                top  : bottomEdge
            };
            break;
        }

        tooltip
            .offset(positions)
            .css('opacity', '1');
    }
};