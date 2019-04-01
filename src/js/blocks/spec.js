$( document ).ready(function () {
    $('.bar').css('opacity', '0');
    function changeElem(params){
        $.ajax({
                url: '/data/change_one',
                type: 'POST',
                cache: false,
                data: params,
                success: function(data) {
                    if (data == 1) {
                        $('.change_btn[data-change =' + params.id +']').val('✓готово');

                        $('.change_btn[data-change =' + params.id +']').animate({
                            'opacity':1
                        },900);
                        $('.change_btn[data-change =' + params.id +']').animate({
                            'opacity':0
                        },600);
                        setTimeout(function () {
                            $('#specification').load(' #specification');
                        },1500);
                    }
                    else {
                        console.log(data);
                        $('.el_amount[data-amount =' + params.id +']').addClass('shake');
                        setTimeout(function () {
                            //$('.change_btn[data-change =' + params.id +']').removeClass('shake');
                            $('.el_amount[data-amount =' + params.id +']').removeClass('shake');
                        },1000);
                    }
                }
            }
        );
    }


    $( document ).on("focus", ".el_amount", function(){
        $('.bar').css('opacity', '0');
        console.log($(this).attr('data-amount'));
        var id = $(this).attr('data-amount');
        $(this).on('keypress', function (e) {
            if(e.which == 13){
                var params = {
                    id: id,
                    name: $('.el_name[data-name =' + id +']').html(),
                    amount: $('.el_amount[data-amount =' + id +']').val()
                };
                console.log('Вы нажали enter на элемент' + id);
                changeElem(params);
            }
        });

        $(this).on('focusout', function (e) {
            var params = {
                id: id,
                name: $('.el_name[data-name =' + id + ']').html(),
                amount: $('.el_amount[data-amount =' + id + ']').val()
            };
            console.log('Вы спустили с элемента' + id);
            changeElem(params);
        });
    });



    $( document ).on("click", ".remove_btn", function() {
        var id = $(this).attr('data-remove');
        var params = {
            id: id,
            name: $('.el_name[data-name =' + id +']').html(),
            amount: $('.el_amount[data-amount =' + id +']').val(),
        };

        console.log(params);

        $.ajax({
                url: '/data/remove_one',
                type: 'POST',
                cache: false,
                data: params,
                success: function(data) {
                    if (data == 1) {
                        $('#specification').load(' #specification');
                    }
                    else {
                        console.log(data);
                    }
                }
            }
        );
    });
});