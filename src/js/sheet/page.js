$(document).ready(function () {
    var catId = $('div.hidden').data('catid');
    var id = $('div.hidden').data('id');
    $('#alert_ok').hide();
    $('#alert_warning').hide();


    $('#btn_send').on('click', function () {

        var params = {
            id: id,
            catId: catId,
            amount:  $('#amount').val(),
            length: $('#length').val(),
            width: $('#width').val(),
            height: $('#height').val()
        };

        $.ajax({
                url: '/cat/ajax_sheet',
                type: 'POST',
                cache: false,
                data: params,
                success: function(data) {
                    console.log(data);

                    if (data == 1) {
                        $('#alert_warning').hide();
                        $('#alert_ok').show(500);
                        setTimeout(function () {
                            $('#alert_ok').hide(1500)
                        },2000);
                        $('#specification').load('/' +  ' #specification');
                        $('#specification').show(1000);

                    }
                    else {
                        setTimeout(function () {
                            $('#btn_send').addClass('shake');
                        },100);

                        setTimeout(function () {
                            $('#btn_send').removeClass('shake');
                        },1000);

                        var arr = JSON.parse(data);
                        var str='';
                        arr.forEach(function (el) {
                            str += '<div class = " pl-2 alert-danger">'+ el +'</div><hr>'
                        });

                        $('#alert_warning').html(str);
                        $('#alert_warning').hide();
                        $('#alert_ok').hide();
                        $('#alert_warning').show(700);
                    }



                }
            }
        );
    });

});