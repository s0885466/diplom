$(document).ready(function () {
    class ButtonUp{
        constructor(selectorParent,id, classButton, name = 'вниз',
                    scrollHide = 20000, time = 500){
            this.selectorParent = selectorParent;
            this.id = id;
            this.classButton = classButton;
            this.name = name;
            this.time = time;
            this.scrollHide = scrollHide;
        }
        //добавить кнопку и событие на нее
        appendButton(){
            var $btn = $(`<button id = "${this.id}">${this.name}</button>`);
            $btn.addClass(`${this.classButton}`);
            //var $btn = $(`<button class = "${this.classButton}">${this.name}</button>`);
            $btn.appendTo(this.selectorParent);
            $btn.hide(0);
            var time = this.time; // делаем для того, чтобы получить по замыканию

            $btn.on('click', function () {
                $('html, body').animate({scrollTop: $('body').height()}, time);
            });
            this.scrollFunc($btn);
        }
        //событие на кнопку
        scrollFunc($btn){
            var scrollHide = this.scrollHide; // делаем для того, чтобы получить по замыканию
            $(document).on('scroll', function (){
                let heightBottom = $('body').height()-1000;
                let $windowTop = $(window).scrollTop();
                if (($windowTop > scrollHide)&&($btn.css('display')==='none')&&($windowTop < heightBottom)){
                    $btn.fadeIn(1000);
                }
                else if(($windowTop <= scrollHide)){
                    $btn.fadeOut(1000);
                }
                else if( $windowTop >= heightBottom){
                    $btn.fadeOut(1000);
                }
            });
        }
    }
    var btn = new ButtonUp(
        'body',
        'fix-bottom',
        'btn btn-primary btn-lg btn-block',
        '<i class="fa fa-arrow-circle-down fa-2x" aria-hidden="true"></i>',
        100,2000);
    btn.appendButton();
});