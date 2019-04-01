$(document).ready(function () {
    var userId = $('div.hidden').data('userid');
    var email = $('div.hidden').data('email');




    $('#btn_download').on('click', function () {

        var params = {
            userId: userId,
            email: email
    };

        $.ajax({
                url: '/private/download',
                type: 'POST',
                cache: false,
                data: params,
                success: function(data) {
                    console.log(data);

                    if (data == 1) {
                        setTimeout(function () {
                            $('#btn_download').val('✓готово');

                        },100);

                        setTimeout(function () {
                            $('#btn_download').val('Скачать');

                        },3000);
                    }
                    else {
                        setTimeout(function () {
                            $('#btn_download').addClass('shake');
                            $('#btn_download').val('Неудача');
                        },100);

                        setTimeout(function () {
                            $('#btn_download').removeClass('shake');
                            $('#btn_download').val('Скачать');

                        },1000);
                    }

                }
            }
        );
    });

});