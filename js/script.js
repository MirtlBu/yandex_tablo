(function() {
    var sticky = document.getElementsByClassName('flight__table--header')[0]; //получаем заголовок
    var stickySibling = document.getElementsByClassName('flight__table--body')[0]; //следующий за ним элемент
    var stickyPosTop = sticky.getBoundingClientRect().top; //положение заголовка по высоте


    window.addEventListener('scroll', function() {
        // var scrollWindow1  = window.pageYOffset;
        var scrollWindow  = document.body.scrollTop;//на столько проскроллилось
        var stickyWidth = sticky.getBoundingClientRect().width; //текущая ширина заголовка

        if(scrollWindow >= stickyPosTop) { //если высота проскролленого больше или равна высоте положения заголовка
            stickySibling.setAttribute('style','transform: translateY(' + sticky.getBoundingClientRect().height + 'px)'); //сдвигаем соседа на высоту заголовка, чтобы не прыгал
            sticky.className = 'flight__table flight__table--header fixed'; //вешаем на загловок класс, который изменяет его позицию на fixed
            sticky.setAttribute('style','width:' + stickyWidth + 'px'); //задаем заголовку старую ширину, потому что он выпал из контекста из-за fixed

        }
        else { //возвращаем все назад
            stickySibling.removeAttribute('style');
            sticky.className = 'flight__table flight__table--header';
        }
    });

    var dataAttr = {};

    function getDataAttrs(elemsCollection) {
        Array.prototype.forEach.call(elemsCollection, function(v, i) {
            dataAttr[v.attributes[1].name] = v.attributes[1].value;
        });
    }

    function setAttrs(elem, attrs) {
        for(var key in attrs) {
            elem.setAttribute(key, attrs[key]);
        }
    }

    function setPopup(obj) {
        Array.prototype.forEach.call(document.getElementsByClassName('popup__text'), function(v, i) {
            v.innerHTML = dataAttr['data-' + v.getAttribute('data')];
        });
        Array.prototype.forEach.call(document.getElementsByClassName('popup__img'), function(v, i) {
            setAttrs(v, {
                'src': dataAttr['data-url'],
                'alt': dataAttr['data-airline'],
                'width': '20',
                'height': '20'
            });
        });
        document.getElementById('popup').className = 'popup popup--visible';
    }
    //на каждый tr вешаем listner события click, который вызовет функцию, получающую из span'ов данные data-атрибутов, после вызываем функцию, сохраняющую данные в попап
    Array.prototype.forEach.call(document.getElementsByClassName('flight__tr'), function(v, i) {
        v.addEventListener('click', function() {
            getDataAttrs(v.getElementsByClassName('flight__content'));
            setPopup(dataAttr);
        });
    });

    document.getElementById('popup-close').addEventListener('click', function() {
        document.getElementById('popup').className = 'popup';
    });

})();