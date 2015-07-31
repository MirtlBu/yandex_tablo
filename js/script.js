(function() {
    var sticky = document.getElementsByClassName('flight__header')[0];
    var stickyParent = sticky.parentNode;
    var stickyPosTop = sticky.getBoundingClientRect().top;//положение заголовка по высоте
    var thList = document.getElementsByClassName('flight__th');
    var tdList = Array.prototype.slice.call(document.getElementsByClassName('flight__td'), 0, 7);
    var thWidth = [];

    //список ширины всех ячеек в заголовке
    // Array.prototype.forEach.call(thList, function(v, i) {
    //     thWidth.push(v.getBoundingClientRect().width);
    // });

    // function setWidth() {
    //     Array.prototype.forEach.call(thList, function(v, i) {
    //         v.setAttribute('style','width:' + thWidth[i] + 'px');
    //     });
    //     Array.prototype.forEach.call(tdList, function(v, i) {
    //         v.setAttribute('style','width:' + thWidth[i] + 'px');
    //     });
    // }

    // window.addEventListener('scroll', function() {
    //     var scrollWindow  = window.pageYOffset;//на столько проскроллилось
    //     if(scrollWindow >= stickyPosTop) {
    //         stickyParent.setAttribute('style','margin-top:' + tdList[0].getBoundingClientRect().height + 'px');
    //         sticky.className = 'flight__tr fixed';
    //     }
    //     else {
    //         stickyParent.removeAttribute('style');
    //         sticky.className = 'flight__tr';
    //     }
    // });

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